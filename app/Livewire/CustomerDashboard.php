<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CustomerDashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        $activeOrdersCount = Order::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'processing'])
            ->count();

        $shippedOrdersCount = Order::where('user_id', $user->id)
            ->where('status', 'shipped')
            ->count();

        $vehiclesCount = DB::table('user_vehicles')
            ->where('user_id', $user->id)
            ->count();

        $latestOrders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('livewire.customer-dashboard', [
            'activeOrdersCount' => $activeOrdersCount,
            'shippedOrdersCount' => $shippedOrdersCount,
            'vehiclesCount' => $vehiclesCount,
            'latestOrders' => $latestOrders,
        ])->layout('layouts.store');
    }
}
