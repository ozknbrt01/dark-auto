<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vehicle;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::query()
            ->with(['vendor', 'vehicles'])
            ->where('status', 'published')
            ->latest()
            ->take(8)
            ->get();

        $vehicleCount = Vehicle::count();
        $productCount = Product::count();

        return view('home', compact('featuredProducts', 'vehicleCount', 'productCount'));
    }
}
