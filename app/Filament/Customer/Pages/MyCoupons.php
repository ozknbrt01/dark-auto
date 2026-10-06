<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class MyCoupons extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.customer.pages.my-coupons';
    protected static string $layout = 'components.customer-layout';
}
