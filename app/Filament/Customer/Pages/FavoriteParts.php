<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class FavoriteParts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.customer.pages.favorite-parts';
    protected static string $layout = 'components.customer-layout';
}
