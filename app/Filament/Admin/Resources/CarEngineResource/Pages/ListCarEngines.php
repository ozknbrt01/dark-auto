<?php

namespace App\Filament\Admin\Resources\CarEngineResource\Pages;

use App\Filament\Admin\Resources\CarEngineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarEngines extends ListRecords
{
    protected static string $resource = CarEngineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(\App\Filament\Imports\CarEngineImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
