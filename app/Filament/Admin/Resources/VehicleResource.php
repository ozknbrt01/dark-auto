<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VehicleResource\Pages;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Araç Veritabanı';
    protected static ?string $navigationLabel = 'Araçlar & Modeller';
    protected static ?string $modelLabel = 'Araç';
    protected static ?string $pluralModelLabel = 'Araçlar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Araç ve Model Bilgileri')
                    ->description('Pazaryerinde parçalarla eşleşecek araç tanımını girin.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('make')
                            ->label('Marka')
                            ->placeholder('Örn: Volkswagen, BMW, Renault, Ford')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('model')
                            ->label('Model')
                            ->placeholder('Örn: Golf, 3 Serisi, Clio, Focus')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('generation')
                            ->label('Kasa / Jenerasyon')
                            ->placeholder('Örn: Mk7 (5G), F30, B8')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('engine')
                            ->label('Motor Seçeneği / Hacmi')
                            ->placeholder('Örn: 1.4 TSI 125 HP, 2.0 TDI 150 HP')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('year_from')
                            ->label('Üretim Başlangıç Yılı')
                            ->numeric()
                            ->minValue(1950)
                            ->maxValue(2050)
                            ->placeholder('Örn: 2012')
                            ->required(),

                        Forms\Components\TextInput::make('year_to')
                            ->label('Üretim Bitiş Yılı')
                            ->numeric()
                            ->minValue(1950)
                            ->maxValue(2050)
                            ->placeholder('Örn: 2020 (Güncel ise boş bırakın)')
                            ->helperText('Araç halen üretiliyorsa boş bırakabilirsiniz.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make')
                    ->label('Marka')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('model')
                    ->label('Model')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('generation')
                    ->label('Kasa')
                    ->badge()
                    ->color('gray')
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('year_range')
                    ->label('Model Yılları')
                    ->getStateUsing(fn (Vehicle $record): string => $record->year_to ? "{$record->year_from} - {$record->year_to}" : "{$record->year_from} - Günümüz"),

                Tables\Columns\TextColumn::make('engine')
                    ->label('Motor')
                    ->searchable()
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Uyumlu Parça Sayısı')
                    ->badge()
                    ->color('info')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('make')
                    ->label('Marka')
                    ->options(fn () => Vehicle::query()->select('make')->distinct()->pluck('make', 'make')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
