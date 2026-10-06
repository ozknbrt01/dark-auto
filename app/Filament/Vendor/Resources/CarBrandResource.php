<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\CarBrandResource\Pages;
use App\Models\CarBrand;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CarBrandResource extends Resource
{
    protected static ?string $model = CarBrand::class;
    
    protected static bool $isScopedToTenant = false;

    protected static ?string $modelLabel = 'Araç Markası';
    protected static ?string $pluralModelLabel = 'Araç Markaları';
    protected static ?string $navigationLabel = 'Markalar';

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'Araç ve Model Bilgileri';

    public static function form(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Marka Adı (Örn: Fiat)'),
            \Filament\Forms\Components\TextInput::make('slug')
                ->maxLength(255)
                ->label('URL Uzantısı (Boş bırakın, otomatik dolar)')
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Adı')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL Uzantısı')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarBrands::route('/'),
        ];
    }
}
