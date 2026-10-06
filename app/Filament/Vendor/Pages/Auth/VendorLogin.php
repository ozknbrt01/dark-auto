<?php

namespace App\Filament\Vendor\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\View\View;

class VendorLogin extends BaseLogin
{
    public function render(): View
    {
        return view('filament.vendor.pages.auth.login')
            ->layout('layouts.guest');
    }
}
