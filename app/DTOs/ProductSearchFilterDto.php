<?php

namespace App\DTOs;

readonly class ProductSearchFilterDto
{
    public function __construct(
        public ?string $query = null,
        public ?int $vehicleId = null,
        public ?int $categoryId = null,
        public ?int $brandId = null,
        public ?float $minPrice = null,
        public ?float $maxPrice = null,
        public ?bool $inStockOnly = true,
        public string $sortBy = 'created_at:desc',
        public int $page = 1,
        public int $perPage = 20,
    ) {}

    public static function fromRequest(array $params): self
    {
        return new self(
            query: $params['q'] ?? null,
            vehicleId: isset($params['vehicle_id']) ? (int) $params['vehicle_id'] : null,
            categoryId: isset($params['category_id']) ? (int) $params['category_id'] : null,
            brandId: isset($params['brand_id']) ? (int) $params['brand_id'] : null,
            minPrice: isset($params['min_price']) ? (float) $params['min_price'] : null,
            maxPrice: isset($params['max_price']) ? (float) $params['max_price'] : null,
            inStockOnly: isset($params['in_stock']) ? filter_var($params['in_stock'], FILTER_VALIDATE_BOOLEAN) : true,
            sortBy: $params['sort'] ?? 'created_at:desc',
            page: (int) ($params['page'] ?? 1),
            perPage: (int) ($params['per_page'] ?? 20),
        );
    }
}
