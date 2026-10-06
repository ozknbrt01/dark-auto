<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Değerlendirmeler';
    protected static ?string $modelLabel = 'Değerlendirme';
    protected static ?string $pluralModelLabel = 'Değerlendirmeler';

    // Otomatik tenant bağlamayı devre dışı bırakıyoruz (ilişki ters yönde olduğu için Filament'in otomatik sorgusu sorun yaratabilir)
    protected static bool $isScopedToTenant = false;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        $tenantId = Filament::getTenant()?->id;

        return parent::getEloquentQuery()
            ->whereHas('product', function (Builder $query) use ($tenantId) {
                if ($tenantId) {
                    $query->where('vendor_id', $tenantId);
                }
            });
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Müşteri Adı')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('product.title')
                    ->label('Ürün/Parça Adı')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('rating')
                    ->label('Puan/Yıldız')
                    ->icon(fn (int $state): string => match ($state) {
                        1, 2, 3, 4, 5 => 'heroicon-s-star',
                        default => 'heroicon-o-star',
                    })
                    ->color(fn (int $state): string => match ($state) {
                        1 => 'danger',
                        2 => 'danger',
                        3 => 'warning',
                        4 => 'success',
                        5 => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('comment')
                    ->label('Yorum Metni')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tarih')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
        ];
    }
}
