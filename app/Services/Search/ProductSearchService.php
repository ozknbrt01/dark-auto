<?php

namespace App\Services\Search;

use App\DTOs\ProductSearchFilterDto;
use App\Models\Product;
use App\Services\Products\OemLookupService;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductSearchService
{
    public function __construct(
        protected OemLookupService $oemLookupService
    ) {}

    public function search(ProductSearchFilterDto $filter): LengthAwarePaginator
    {
        $searchTerm = $filter->query ?? '';

        if (!empty($searchTerm)) {
            $cleanOem = $this->oemLookupService->sanitizeOem($searchTerm);
            if (strlen($cleanOem) >= 4) {
                $searchTerm = "{$searchTerm} {$cleanOem}";
            }
        }

        $scout = Product::search($searchTerm, function ($meilisearch, string $query, array $options) use ($filter) {
            $filters = [];

            if ($filter->inStockOnly) {
                $filters[] = 'is_in_stock = true';
            }

            if ($filter->categoryId) {
                $filters[] = "category_id = {$filter->categoryId}";
            }

            if ($filter->brandId) {
                $filters[] = "brand_id = {$filter->brandId}";
            }

            if ($filter->minPrice !== null) {
                $filters[] = "price >= {$filter->minPrice}";
            }
            if ($filter->maxPrice !== null) {
                $filters[] = "price <= {$filter->maxPrice}";
            }

            if ($filter->vehicleId) {
                $filters[] = "(vehicle_ids = {$filter->vehicleId} OR is_universal = true)";
            }

            if (!empty($filters)) {
                $options['filter'] = implode(' AND ', $filters);
            }

            $options['sort'] = [$filter->sortBy];
            $options['facets'] = ['brand_id', 'category_id', 'is_universal'];

            return $meilisearch->search($query, $options);
        });

        return $scout->paginate($filter->perPage, 'page', $filter->page)
            ->load(['brand', 'category', 'vendor', 'oemNumbers', 'images']);
    }
}
