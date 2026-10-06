<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\CarEngineResource\Pages;
use App\Models\CarEngine;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CarEngineResource extends Resource
{
    protected static ?string $model = CarEngine::class;

    protected static bool $isScopedToTenant = false;

    protected static ?string $modelLabel = 'Kasa & Motor';
    protected static ?string $pluralModelLabel = 'Kasa & Motor Seçenekleri';
    protected static ?string $navigationLabel = 'Kasalar ve Motorlar';

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Araç ve Model Bilgileri';

    public static function form(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\Select::make('car_model_id')
                ->relationship('carModel', 'name')
                ->required()
                ->searchable()
                ->label('Araç Modeli (Örn: Egea)'),
            \Filament\Forms\Components\TextInput::make('chassis')
                ->required()
                ->maxLength(255)
                ->label('Kasa Kodu (Örn: Tip 356)'),
            \Filament\Forms\Components\TextInput::make('year_start')
                ->required()
                ->numeric()
                ->label('Başlangıç Yılı (Örn: 2015)'),
            \Filament\Forms\Components\TextInput::make('year_end')
                ->numeric()
                ->label('Bitiş Yılı (Hala üretiliyorsa boş bırakın)'),
            \Filament\Forms\Components\TextInput::make('engine_type')
                ->required()
                ->maxLength(255)
                ->label('Motor Tipi (Örn: 1.4 Fire)'),
            \Filament\Forms\Components\TextInput::make('fuel_type')
                ->required()
                ->maxLength(255)
                ->label('Yakıt Tipi (Örn: Benzin)'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('carModel.brand.name')
                    ->label('Marka')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('warning'),
                Tables\Columns\TextColumn::make('carModel.name')
                    ->label('Model')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('chassis')
                    ->label('Kasa Kodu')
                    ->searchable()
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('year_start')
                    ->label('Başlangıç Yılı')
                    ->formatStateUsing(fn ($record) => $record->year_start . ' - ' . ($record->year_end ?? 'Günümüz')),
                Tables\Columns\TextColumn::make('engine_type')
                    ->label('Motor Tipi')
                    ->description(fn ($record) => $record->fuel_type)
                    ->searchable(),
                Tables\Columns\TextColumn::make('parts_count')
                    ->label('Uyumlu Parça')
                    ->default('0 Adet')
                    ->badge()
                    ->color('success'),
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
            'index' => Pages\ListCarEngines::route('/'),
        ];
    }
}
