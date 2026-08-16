<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Sipariş Yönetimi';
    protected static ?string $navigationLabel = 'Tüm Siparişler';
    protected static ?string $modelLabel = 'Sipariş';
    protected static ?string $pluralModelLabel = 'Siparişler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sipariş Temel Bilgileri')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('Sipariş No')
                            ->disabled(),

                        Forms\Components\Select::make('status')
                            ->label('Sipariş Durumu')
                            ->options([
                                'pending' => 'Onay Bekliyor',
                                'processing' => 'Hazırlanıyor',
                                'shipped' => 'Kargoya Verildi',
                                'completed' => 'Tamamlandı',
                                'cancelled' => 'İptal Edildi',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('total_amount')
                            ->label('Toplam Tutar')
                            ->numeric()
                            ->prefix('₺')
                            ->disabled(),
                    ]),

                Forms\Components\Section::make('Müşteri ve Teslimat Bilgileri')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('customer_name')
                            ->label('Müşteri Adı')
                            ->required(),

                        Forms\Components\TextInput::make('customer_email')
                            ->label('E-Posta')
                            ->email(),

                        Forms\Components\TextInput::make('customer_phone')
                            ->label('Telefon'),

                        Forms\Components\Textarea::make('shipping_address')
                            ->label('Teslimat Adresi')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Sipariş Kalemleri & Satıcı Dağılımı')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship('items')
                            ->columns(4)
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Ürün')
                                    ->relationship('product', 'title')
                                    ->disabled()
                                    ->columnSpan(2),

                                Forms\Components\Select::make('vendor_id')
                                    ->label('Satıcı / Dükkan')
                                    ->relationship('vendor', 'store_name')
                                    ->disabled(),

                                Forms\Components\TextInput::make('quantity')
                                    ->label('Adet')
                                    ->numeric()
                                    ->disabled(),

                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Birim Fiyat (₺)')
                                    ->numeric()
                                    ->disabled(),

                                Forms\Components\TextInput::make('total_price')
                                    ->label('Toplam Tutar (₺)')
                                    ->numeric()
                                    ->disabled(),
                            ])
                            ->disableItemCreation()
                            ->disableItemDeletion(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Sipariş No')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Müşteri')
                    ->searchable(),

                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('Telefon')
                    ->searchable(),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Tutar')
                    ->money('TRY')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Ürün Çeşidi')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Durum')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Onay Bekliyor',
                        'processing' => 'Hazırlanıyor',
                        'shipped' => 'Kargolandı',
                        'completed' => 'Tamamlandı',
                        'cancelled' => 'İptal Edildi',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tarih')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Durum')
                    ->options([
                        'pending' => 'Onay Bekliyor',
                        'processing' => 'Hazırlanıyor',
                        'shipped' => 'Kargolandı',
                        'completed' => 'Tamamlandı',
                        'cancelled' => 'İptal Edildi',
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
