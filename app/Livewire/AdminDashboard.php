<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $usersCount = \App\Models\User::count();
        $vendorsCount = \App\Models\Vendor::count();
        $ordersCount = \App\Models\Order::count();
        $totalSales = \App\Models\Order::where('status', 'completed')->sum('total_amount');
        
        $pendingApplications = \App\Models\User::where('vendor_status', 'pending')->latest()->take(5)->get();

        return view('livewire.admin-dashboard', [
            'usersCount' => $usersCount,
            'vendorsCount' => $vendorsCount,
            'ordersCount' => $ordersCount,
            'totalSales' => $totalSales,
            'pendingApplications' => $pendingApplications,
        ])->layout('layouts.store');
    }

    public function approveVendor($userId)
    {
        $user = \App\Models\User::find($userId);
        if($user && $user->vendor_status === 'pending') {
            $user->update([
                'vendor_status' => 'approved',
                'is_vendor' => true,
            ]);
            
            \App\Models\Vendor::where('user_id', $user->id)->update([
                'status' => 'approved',
                'is_active' => true,
            ]);
            
            session()->flash('success', 'Satıcı başvurusu onaylandı.');
        }
    }
}
