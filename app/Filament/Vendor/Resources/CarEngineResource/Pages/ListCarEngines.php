<?php

namespace App\Filament\Vendor\Resources\CarEngineResource\Pages;

use App\Filament\Vendor\Resources\CarEngineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarEngines extends ListRecords
{
    protected static string $resource = CarEngineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
