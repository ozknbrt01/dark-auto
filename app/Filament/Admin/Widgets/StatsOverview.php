<?php

namespace App\Filament\Admin\Widgets;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Toplam Araç Modeli', CarModel::count())
                ->description('Sistemde kayıtlı toplam model')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

            Stat::make('Sistemdeki Markalar', CarBrand::count())
                ->description('Kayıtlı araç markaları')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([3, 5, 2, 7, 10, 5, 12])
                ->color('success'),

            Stat::make('Aktif Kategoriler', Category::where('is_active', true)->count())
                ->description('Yayındaki ana kategoriler')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 4, 2, 8, 5, 9, 14])
                ->color('primary'),
        ];
    }
}
