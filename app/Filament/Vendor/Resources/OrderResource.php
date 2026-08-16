<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Gelen Siparişler';
    protected static ?string $modelLabel = 'Sipariş';
    protected static ?string $pluralModelLabel = 'Siparişler';

    /**
     * Satıcı sadece kendi ürünlerini içeren siparişleri görür
     */
    public static function getEloquentQuery(): Builder
    {
        $tenantId = Filament::getTenant()?->id;

        return parent::getEloquentQuery()
            ->whereHas('items', function (Builder $query) use ($tenantId) {
                if ($tenantId) {
                    $query->where('vendor_id', $tenantId);
                }
            });
    }

    public static function form(Form $form): Form
    {
        $tenantId = Filament::getTenant()?->id;

        return $form
            ->schema([
                Forms\Components\Section::make('Sipariş Detayları')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('Sipariş No')
                            ->disabled(),

                        Forms\Components\TextInput::make('status')
                            ->label('Genel Durum')
                            ->disabled(),

                        Forms\Components\TextInput::make('customer_name')
                            ->label('Müşteri')
                            ->disabled(),

                        Forms\Components\Textarea::make('shipping_address')
                            ->label('Kargo Teslimat Adresi')
                            ->rows(3)
                            ->columnSpanFull()
                            ->disabled(),
                    ]),

                Forms\Components\Section::make('Mağazanıza Ait Sipariş Kalemleri')
                    ->description('Bu siparişte dükkanınızdan satın alınan parçalar.')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship('items', modifyQueryUsing: fn (Builder $query) => $tenantId ? $query->where('vendor_id', $tenantId) : $query)
                            ->columns(4)
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Ürün')
                                    ->relationship('product', 'title')
                                    ->disabled()
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('quantity')
                                    ->label('Adet')
                                    ->numeric()
                                    ->disabled(),

                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Birim Fiyat')
                                    ->numeric()
                                    ->prefix('₺')
                                    ->disabled(),

                                Forms\Components\TextInput::make('total_price')
                                    ->label('Toplam Hakediş')
                                    ->numeric()
                                    ->prefix('₺')
                                    ->disabled(),
                            ])
                            ->disableItemCreation()
                            ->disableItemDeletion(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        $tenantId = Filament::getTenant()?->id;

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Sipariş No')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Alıcı Müşteri')
                    ->searchable(),

                Tables\Columns\TextColumn::make('vendor_subtotal')
                    ->label('Mağaza Hakedişi')
                    ->getStateUsing(function (Order $record) use ($tenantId) {
                        return $record->items()
                            ->where('vendor_id', $tenantId)
                            ->sum('total_price');
                    })
                    ->money('TRY')
                    ->sortable()
                    ->weight('bold'),

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
                        'pending' => 'Hazırlanacak',
                        'processing' => 'Hazırlanıyor',
                        'shipped' => 'Kargolandı',
                        'completed' => 'Teslim Edildi',
                        'cancelled' => 'İptal',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Sipariş Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
