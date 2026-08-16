<?php

namespace App\Enums;

enum SubOrderStatus: string
{
    case PENDING = 'pending';       // Yeni Sipariş
    case PREPARING = 'preparing';   // Hazırlanıyor
    case SHIPPED = 'shipped';       // Kargoya Verildi
    case DELIVERED = 'delivered';   // Teslim Edildi
    case CANCELLED = 'cancelled';   // İptal Edildi
    case REFUNDED = 'refunded';     // İade Edildi

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Yeni Sipariş',
            self::PREPARING => 'Hazırlanıyor',
            self::SHIPPED => 'Kargoya Verildi',
            self::DELIVERED => 'Teslim Edildi',
            self::CANCELLED => 'İptal Edildi',
            self::REFUNDED => 'İade Edildi',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::PREPARING => 'info',
            self::SHIPPED => 'primary',
            self::DELIVERED => 'success',
            self::CANCELLED, self::REFUNDED => 'danger',
        };
    }
}
