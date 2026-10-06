<?php

namespace App\Livewire;

use Livewire\Component;

class BecomeVendor extends Component
{
    public $shop_name;
    public $tax_number;
    public $tax_office;
    public $company_address;

    protected $rules = [
        'shop_name' => 'required|min:3',
        'tax_number' => 'required|min:5',
        'tax_office' => 'required|min:3',
        'company_address' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        $user = auth()->user();

        // Kullanıcıyı güncelle
        $user->update([
            'shop_name' => $this->shop_name,
            'tax_number' => $this->tax_number,
            'tax_office' => $this->tax_office,
            'company_address' => $this->company_address,
            'vendor_status' => 'pending',
        ]);

        // Ayrıca Vendor modeline de kaydet (Fakat is_vendor false kalacak, admin onaylayacak)
        \App\Models\Vendor::firstOrCreate(
            ['user_id' => $user->id],
            [
                'store_name' => $this->shop_name,
                'tax_number' => $this->tax_number,
                'slug' => \Illuminate\Support\Str::slug($this->shop_name . '-' . uniqid()),
                'status' => 'pending',
                'is_active' => false,
            ]
        );

        session()->flash('success', 'Başvurunuz başarıyla alındı! Yönetici onayından sonra bilgilendirileceksiniz.');
        return redirect()->route('hesabim');
    }

    public function render()
    {
        return view('livewire.become-vendor')->layout('layouts.store');
    }
}
