<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Vehicles\VehicleLookupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleLookupController extends Controller
{
    public function __construct(
        protected VehicleLookupService $lookupService
    ) {}

    public function makes(): JsonResponse
    {
        return response()->json($this->lookupService->getActiveMakes());
    }

    public function models(string $make): JsonResponse
    {
        return response()->json($this->lookupService->getModelsByMake($make));
    }

    public function vehicles(Request $request, string $make, string $model): JsonResponse
    {
        $year = $request->integer('year') ?: null;
        $vehicles = $this->lookupService->getVehiclesByModelAndYear($make, $model, $year);

        return response()->json($vehicles->map(fn($v) => [
            'id' => $v->id,
            'title' => $v->full_title,
            'make' => $v->make,
            'model' => $v->model,
            'generation' => $v->generation,
            'engine' => $v->engine,
            'year_from' => $v->year_from,
            'year_to' => $v->year_to,
        ]));
    }
}
