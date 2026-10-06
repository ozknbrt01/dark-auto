<?php

namespace App\Filament\Vendor\Pages;

use App\Models\Category;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class CommissionRates extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    protected static string $view = 'filament.vendor.pages.commission-rates';

    protected static ?string $navigationLabel = 'Komisyon Oranları';

    protected static ?string $title = 'Komisyon Oranları & Şartlar';

    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())
            ->columns([
                TextColumn::make('name')
                    ->label('Kategori Adı')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('commission_rate')
                    ->label('Komisyon Oranı')
                    ->suffix('%')
                    ->sortable(),
            ])
            ->defaultSort('name', 'asc')
            ->paginated(false);
    }
}
