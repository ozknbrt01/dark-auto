<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['items.product', 'items.vendor'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.orders', compact('orders'));
    }

    public function show(string $orderNumber): View
    {
        $order = Order::where('user_id', auth()->id())
            ->where('order_number', $orderNumber)
            ->with(['items.product', 'items.vendor', 'subOrders.vendor'])
            ->firstOrFail();

        return view('order-success', compact('order'));
    }
}
