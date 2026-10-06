<?php

namespace App\Filament\Customer\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.customer.pages.dashboard';
    
    protected static string $layout = 'components.customer-layout';

    protected static ?string $title = 'Hesabım';
}
