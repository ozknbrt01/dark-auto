<?php

namespace App\Filament\Admin\Resources\CarEngineResource\Pages;

use App\Filament\Admin\Resources\CarEngineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarEngine extends EditRecord
{
    protected static string $resource = CarEngineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
