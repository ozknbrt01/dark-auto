<?php

namespace App\Filament\Vendor\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditVendorProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Mağaza Ayarları';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('store_name')
                    ->label('Mağaza Adı')
                    ->required(),
                TextInput::make('tax_number')
                    ->label('Vergi Numarası'),
                Toggle::make('is_active')
                    ->label('Mağaza Durumu (Aktif/Pasif)')
                    ->helperText('Tatil moduna geçmek ve satışları geçici olarak durdurmak için kapatabilirsiniz.')
                    ->default(true),
            ]);
    }
}
