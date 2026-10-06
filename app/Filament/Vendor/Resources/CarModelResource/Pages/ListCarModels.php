<?php

namespace App\Filament\Vendor\Resources\CarModelResource\Pages;

use App\Filament\Vendor\Resources\CarModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarModels extends ListRecords
{
    protected static string $resource = CarModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
