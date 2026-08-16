<?php

namespace App\Models;

use App\Services\Vehicles\VehicleCompatibilityService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'vendor_id',
        'oem_code',
        'title',
        'name',
        'sku',
        'price',
        'description',
        'stock_quantity',
        'is_universal',
        'status',
        'slug',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'is_universal' => 'boolean',
    ];

    public function setAttribute($key, $value)
    {
        if ($key === 'name') {
            $key = 'title';
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        if ($key === 'name') {
            return $this->getAttribute('title');
        }

        return parent::getAttribute($key);
    }

    /**
     * Dükkan / Satıcı İlişkisi
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Uyumlu Araçlar (Fitment Many-to-Many)
     */
    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'product_vehicle')
            ->withPivot('notes')
            ->withTimestamps();
    }

    public function shouldBeSearchable(): bool
    {
        return ($this->status === 'published' || $this->status === 'active') && $this->deleted_at === null;
    }

    public function makeSearchableUsing(\Illuminate\Database\Eloquent\Collection $models): \Illuminate\Database\Eloquent\Collection
    {
        return $models->load(['vendor', 'vehicles']);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'name' => $this->title,
            'oem_code' => $this->oem_code,
            'clean_oem_code' => strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $this->oem_code ?? '')),
            'sku' => $this->sku,
            'description' => strip_tags($this->description ?? ''),
            'price' => (float) $this->price,
            'stock_quantity' => (int) $this->stock_quantity,
            'is_in_stock' => $this->stock_quantity > 0,
            'is_universal' => (bool) $this->is_universal,
            'vendor_id' => (int) $this->vendor_id,
            'vendor_name' => $this->vendor?->store_name,
            'vehicle_ids' => $this->vehicles->pluck('id')->toArray(),
        ];
    }

    public function scopeCompatibleWith(Builder $query, int $vehicleId): Builder
    {
        return app(VehicleCompatibilityService::class)->applyVehicleFilter($query, $vehicleId);
    }
}
