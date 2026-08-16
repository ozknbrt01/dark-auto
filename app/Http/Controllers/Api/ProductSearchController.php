<?php

namespace App\Http\Controllers\Api;

use App\DTOs\ProductSearchFilterDto;
use App\Http\Controllers\Controller;
use App\Services\Search\ProductSearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    public function __construct(
        protected ProductSearchService $searchService
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $filterDto = ProductSearchFilterDto::fromRequest($request->all());
        $results = $this->searchService->search($filterDto);

        return response()->json([
            'data' => $results->items(),
            'meta' => [
                'current_page' => $results->currentPage(),
                'last_page' => $results->lastPage(),
                'per_page' => $results->perPage(),
                'total' => $results->total(),
            ],
        ]);
    }
}
