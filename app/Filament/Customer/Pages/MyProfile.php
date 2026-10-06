<?php
namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.customer.pages.my-profile';

    public $name;
    public $email;
    public $phone;
    public $successMessage = false;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone ?? ''; 
    }

    public function updateProfile()
    {
        $user = Auth::user();
        $user->name = $this->name;

        // Eğer users tablosunda phone sütunu varsa onu da kaydet
        if (Schema::hasColumn('users', 'phone')) {
            $user->phone = $this->phone;
        }

        $user->save();
        $this->successMessage = true;
    }
    protected static string $layout = 'components.customer-layout';
}
