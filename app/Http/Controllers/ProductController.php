<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function search(Request $request): View
    {
        $vehicleId = $request->integer('vehicle_id');
        $searchTerm = trim($request->input('search_term') ?? $request->input('q') ?? '');

        $query = Product::query()
            ->with(['vendor', 'vehicles'])
            ->where('status', 'published');

        $selectedVehicle = null;
        if ($vehicleId) {
            $selectedVehicle = Vehicle::find($vehicleId);
            if ($selectedVehicle) {
                $query->where(function ($q) use ($vehicleId) {
                    $q->whereHas('vehicles', function ($vq) use ($vehicleId) {
                        $vq->where('vehicles.id', $vehicleId);
                    })->orWhere('is_universal', true);
                });
            }
        }

        if (!empty($searchTerm)) {
            $cleanOem = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $searchTerm));
            $query->where(function ($q) use ($searchTerm, $cleanOem) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('oem_code', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%");

                if (strlen($cleanOem) >= 3) {
                    $q->orWhereRaw("UPPER(REPLACE(REPLACE(REPLACE(oem_code, ' ', ''), '-', ''), '.', '')) LIKE ?", ["%{$cleanOem}%"]);
                }
            });
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        return view('products.index', compact('products', 'selectedVehicle', 'searchTerm'));
    }
}
