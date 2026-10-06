<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CarModelResource\Pages;
use App\Filament\Admin\Resources\CarModelResource\RelationManagers;
use App\Models\CarModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarModelResource extends Resource
{
    protected static ?string $model = CarModel::class;

    protected static ?string $modelLabel = 'Araç Modeli';
    protected static ?string $pluralModelLabel = 'Araç Modelleri';
    protected static ?string $navigationLabel = 'Modeller';

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Araç Veritabanı';

    public static function form(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Select::make('car_brand_id')
                ->relationship('brand', 'name')
                ->required()
                ->searchable()
                ->label('Araç Markası'),
            \Filament\Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->label('Model Adı (Örn: Egea)'),
            \Filament\Forms\Components\TextInput::make('slug')
                ->maxLength(255)
                ->label('URL Uzantısı')
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Marka')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
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
            ->defaultGroup('brand.name')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarModels::route('/'),
            'create' => Pages\CreateCarModel::route('/create'),
            'edit' => Pages\EditCarModel::route('/{record}/edit'),
        ];
    }
}
