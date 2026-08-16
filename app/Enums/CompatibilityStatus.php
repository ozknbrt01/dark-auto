<?php

namespace App\Enums;

enum CompatibilityStatus: string
{
    case COMPATIBLE = 'compatible';       // Birebir uyumlu
    case INCOMPATIBLE = 'incompatible';   // Uyumsuz
    case UNIVERSAL = 'universal';         // Evrensel parça (tüm araçlara uyar)

    public function label(): string
    {
        return match ($this) {
            self::COMPATIBLE => 'Aracınızla Birebir Uyumlu',
            self::INCOMPATIBLE => 'Bu Parça Aracınızla Uyumlu Değil',
            self::UNIVERSAL => 'Tüm Araçlarla Uyumlu (Evrensel Ürün)',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::COMPATIBLE => 'success',
            self::INCOMPATIBLE => 'danger',
            self::UNIVERSAL => 'info',
        };
    }
}
