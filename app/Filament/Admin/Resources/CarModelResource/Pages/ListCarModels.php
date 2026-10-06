<?php

namespace App\Filament\Admin\Resources\CarModelResource\Pages;

use App\Filament\Admin\Resources\CarModelResource;
use App\Filament\Imports\CarModelImporter;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarModels extends ListRecords
{
    protected static string $resource = CarModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(CarModelImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
