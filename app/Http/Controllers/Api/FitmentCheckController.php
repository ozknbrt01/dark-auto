<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Vehicles\VehicleCompatibilityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FitmentCheckController extends Controller
{
    public function __construct(
        protected VehicleCompatibilityService $compatibilityService
    ) {}

    public function check(Request $request, Product $product): JsonResponse
    {
        $request->validate([
            'vehicle_id' => ['required', 'integer', 'exists:vehicles,id'],
        ]);

        $result = $this->compatibilityService->checkCompatibility(
            product: $product,
            vehicle: $request->integer('vehicle_id')
        );

        return response()->json($result->toArray());
    }
}
