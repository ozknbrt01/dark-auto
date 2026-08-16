<?php

namespace App\Models;

use Filament\Models\Contracts\HasCurrentTenantLabel;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model implements HasCurrentTenantLabel, HasName
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'store_name',
        'name',
        'slug',
        'description',
        'tax_number',
        'status',
        'commission_rate',
    ];

    protected $casts = [
        'commission_rate' => 'decimal:2',
    ];

    public function setAttribute($key, $value)
    {
        if ($key === 'name') {
            $key = 'store_name';
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        if ($key === 'name') {
            return $this->getAttribute('store_name');
        }

        return parent::getAttribute($key);
    }

    /**
     * Filament Tenant Adı Sözleşmesi
     */
    public function getFilamentName(): string
    {
        return $this->store_name ?? 'Satıcı';
    }

    /**
     * Filament Tenant Başlığı
     */
    public function getCurrentTenantLabel(): string
    {
        return 'Aktif Mağaza: ' . ($this->store_name ?? 'Satıcı');
    }

    /**
     * Dükkan Sahibi (User) ilişkisi
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Çoklu personel / kullanıcı ilişkisi (Pivot)
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'vendor_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Satıcının Ürünleri
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Satıcının Sipariş Kalemleri
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Satıcının dahil olduğu Siparişler
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items', 'vendor_id', 'order_id')->distinct();
    }

    /**
     * Satıcının Alt Siparişleri
     */
    public function subOrders(): HasMany
    {
        return $this->hasMany(SubOrder::class);
    }
}
