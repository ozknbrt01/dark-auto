<?php

namespace App\Filament\Vendor\Resources;

use App\Enums\SubOrderStatus;
use App\Filament\Vendor\Resources\SubOrderResource\Pages;
use App\Models\SubOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SubOrderResource extends Resource
{
    protected static ?string $model = SubOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Siparişlerim';
    protected static ?string $modelLabel = 'Sipariş';
    protected static ?string $pluralModelLabel = 'Siparişler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sipariş ve Finansal Detaylar')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('sub_order_number')
                            ->label('Alt Sipariş No')
                            ->disabled(),

                        Forms\Components\TextInput::make('subtotal')
                            ->label('Ürün Tutarı')
                            ->prefix('₺')
                            ->disabled(),

                        Forms\Components\TextInput::make('vendor_earnings')
                            ->label('Net Hakedişiniz')
                            ->prefix('₺')
                            ->disabled(),
                    ]),

                Forms\Components\Section::make('Kargo & Gönderi Yönetimi')
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Sipariş Durumu')
                            ->options(collect(SubOrderStatus::cases())->mapWithKeys(fn($s) => [$s->value => $s->label()]))
                            ->required(),

                        Forms\Components\Select::make('shipping_carrier')
                            ->label('Kargo Firması')
                            ->options([
                                'Yurtiçi Kargo' => 'Yurtiçi Kargo',
                                'Aras Kargo' => 'Aras Kargo',
                                'MNG Kargo' => 'MNG Kargo',
                                'Sürat Kargo' => 'Sürat Kargo',
                                'Trendyol Express' => 'Trendyol Express',
                            ]),

                        Forms\Components\TextInput::make('tracking_code')
                            ->label('Kargo Takip No')
                            ->placeholder('Takip barkodunu girin'),
                    ]),

                Forms\Components\Section::make('Siparişteki Parçalar')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('product_name')->label('Parça Adı')->disabled()->columnSpan(2),
                                Forms\Components\TextInput::make('sku')->label('Stok Kodu (SKU)')->disabled(),
                                Forms\Components\TextInput::make('quantity')->label('Adet')->disabled(),
                                Forms\Components\TextInput::make('unit_price')->label('Birim Fiyat')->prefix('₺')->disabled(),
                                Forms\Components\TextInput::make('total_price')->label('Toplam')->prefix('₺')->disabled(),
                            ])
                            ->columns(6)
                            ->deletable(false)
                            ->addable(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sub_order_number')
                    ->label('Sipariş No')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('order.customer_name')
                    ->label('Müşteri')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subtotal')
                    ->label('Toplam Tutar')
                    ->money('TRY')
                    ->sortable(),

                Tables\Columns\TextColumn::make('vendor_earnings')
                    ->label('Hakediş')
                    ->money('TRY')
                    ->weight('bold')
                    ->color('success'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Durum')
                    ->badge()
                    ->formatStateUsing(fn (SubOrderStatus $state): string => $state->label())
                    ->color(fn (SubOrderStatus $state): string => $state->color()),

                Tables\Columns\TextColumn::make('shipping_carrier')
                    ->label('Kargo'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tarih')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Sipariş Durumu')
                    ->options(collect(SubOrderStatus::cases())->mapWithKeys(fn ($item) => [$item->value => $item->label()])),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Detay & Kargo'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubOrders::route('/'),
            'edit' => Pages\EditSubOrder::route('/{record}/edit'),
        ];
    }
}
