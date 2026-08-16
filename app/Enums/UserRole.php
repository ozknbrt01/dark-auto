<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case VENDOR_OWNER = 'vendor_owner';
    case VENDOR_STAFF = 'vendor_staff';
    case CUSTOMER = 'customer';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Süper Yönetici',
            self::ADMIN => 'Pazaryeri Yöneticisi',
            self::VENDOR_OWNER => 'Mağaza Sahibi',
            self::VENDOR_STAFF => 'Mağaza Personeli',
            self::CUSTOMER => 'Müşteri',
        };
    }
}
