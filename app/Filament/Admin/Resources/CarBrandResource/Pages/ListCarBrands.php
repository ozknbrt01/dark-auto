<?php

namespace App\Filament\Admin\Resources\CarBrandResource\Pages;

use App\Filament\Admin\Resources\CarBrandResource;
use App\Filament\Imports\CarBrandImporter;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarBrands extends ListRecords
{
    protected static string $resource = CarBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(CarBrandImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
