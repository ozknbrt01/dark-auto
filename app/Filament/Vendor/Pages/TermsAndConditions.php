<?php
namespace App\Filament\Vendor\Pages;

use Filament\Pages\Page;

class TermsAndConditions extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Satıcı Sözleşmesi';
    protected static ?string $title = 'Satıcı İş Ortaklığı ve Komisyon Şartları';
    protected static ?string $navigationGroup = 'Mağaza Yönetimi';
    protected static string $view = 'filament.vendor.pages.terms-and-conditions';
}
