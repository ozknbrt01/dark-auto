<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Vehicle;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'Katalog Yönetimi';
    protected static ?string $navigationLabel = 'Yedek Parça & Ürünler';
    protected static ?string $modelLabel = 'Ürün';
    protected static ?string $pluralModelLabel = 'Ürünler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Ürün Temel Bilgileri')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Ürün / Parça Adı')
                            ->placeholder('Örn: Ön Fren Balatası Takımı')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('oem_code')
                            ->label('OEM Kodu (Orijinal Parça Kodu)')
                            ->placeholder('Örn: 06A 115 561 B')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Aramalarda ve araç eşleştirmelerinde en kritik alandır.'),

                        Forms\Components\TextInput::make('sku')
                            ->label('Stok Kodu (SKU)')
                            ->placeholder('Örn: BSH-00912')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('price')
                            ->label('Satış Fiyatı (₺)')
                            ->numeric()
                            ->prefix('₺')
                            ->required(),

                        Forms\Components\Select::make('vendor_id')
                            ->label('Satıcı / Dükkan')
                            ->relationship('vendor', 'store_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->helperText('Bu parçayı listeleyen mağazayı seçin.'),

                        Forms\Components\TextInput::make('stock_quantity')
                            ->label('Stok Adedi')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ]),

                Forms\Components\Section::make('Araç Uyumluluk Motoru (Fitment)')
                    ->description('Bu parçanın birebir uyumlu olduğu araçları seçin.')
                    ->schema([
                        Forms\Components\Select::make('vehicles')
                            ->label('Uyumlu Araçlar')
                            ->multiple()
                            ->relationship('vehicles', 'model')
                            ->getOptionLabelFromRecordUsing(fn (Vehicle $record) => "{$record->make} {$record->model} {$record->generation} ({$record->year_from}-" . ($record->year_to ?? 'Günümüz') . ") {$record->engine}")
                            ->searchable()
                            ->preload()
                            ->helperText('Birden fazla araç modeli seçebilirsiniz.')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Ürün Detayları')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Detaylı Parça Açıklaması')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Ürün Adı')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('oem_code')
                    ->label('OEM Kodu')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Fiyat')
                    ->money('TRY')
                    ->sortable(),

                Tables\Columns\TextColumn::make('vendor.store_name')
                    ->label('Satıcı')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('vehicles_count')
                    ->counts('vehicles')
                    ->label('Uyumlu Araç')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Stok')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('vendor')
                    ->label('Satıcı')
                    ->relationship('vendor', 'store_name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
