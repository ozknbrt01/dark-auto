<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'user_id',
        'total_amount',
        'grand_total',
        'subtotal',
        'shipping_total',
        'discount_total',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address',
        'billing_address',
        'customer_name',
        'customer_email',
        'customer_phone',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    public function setAttribute($key, $value)
    {
        if ($key === 'grand_total') {
            $key = 'total_amount';
        }

        if (in_array($key, ['shipping_address', 'billing_address']) && is_array($value)) {
            $value = $value['address'] ?? json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        if ($key === 'grand_total') {
            return $this->getAttribute('total_amount');
        }

        return parent::getAttribute($key);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function subOrders(): HasMany
    {
        return $this->hasMany(SubOrder::class);
    }

    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'order_items', 'order_id', 'vendor_id')->distinct();
    }
}
