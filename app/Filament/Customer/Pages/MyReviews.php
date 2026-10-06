<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class MyReviews extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.customer.pages.my-reviews';
    protected static string $layout = 'components.customer-layout';
}
