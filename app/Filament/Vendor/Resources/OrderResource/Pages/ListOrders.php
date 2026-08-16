<?php

namespace App\Filament\Vendor\Resources\OrderResource\Pages;

use App\Filament\Vendor\Resources\OrderResource;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;
}
