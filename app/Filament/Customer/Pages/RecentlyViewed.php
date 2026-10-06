<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class RecentlyViewed extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.customer.pages.recently-viewed';
    protected static string $layout = 'components.customer-layout';
}
