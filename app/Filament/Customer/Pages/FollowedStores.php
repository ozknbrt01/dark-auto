<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class FollowedStores extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.customer.pages.followed-stores';
    protected static string $layout = 'components.customer-layout';
}
