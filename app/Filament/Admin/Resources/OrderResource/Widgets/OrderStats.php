<?php

namespace App\Filament\Admin\Resources\OrderResource\Widgets;

use App\Models\Order;
use App\Models\OrderItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalRevenue = Order::sum('total_amount');
        $totalCommission = OrderItem::sum('commission_amount');
        $totalOrders = Order::count();

        return [
            Stat::make('Platform Cirosu (Net)', number_format($totalRevenue, 2, ',', '.') . ' ₺')
                ->description('Bugüne kadarki toplam satış tutarı')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('primary'),

            Stat::make('Toplam Komisyon Kazancı', number_format($totalCommission, 2, ',', '.') . ' ₺')
                ->description('Kesilen net komisyonlar')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Toplam Sipariş', $totalOrders)
                ->description('Platformdaki tüm sipariş sayısı')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('info'),
        ];
    }
}
