<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'generation',
        'year_from',
        'year_to',
        'engine',
    ];

    protected $casts = [
        'year_from' => 'integer',
        'year_to' => 'integer',
    ];

    /**
     * Bu araçla uyumlu ürünler
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_vehicle')
            ->withPivot('notes')
            ->withTimestamps();
    }

    /**
     * Araç için kullanıcı dostu tam başlık:
     * Örn: "Volkswagen Golf Mk7 (2012-2020) 1.4 TSI"
     */
    public function getFullTitleAttribute(): string
    {
        $yearRange = $this->year_to ? "{$this->year_from}-{$this->year_to}" : "{$this->year_from}+";
        return trim("{$this->make} {$this->model} {$this->generation} ({$yearRange}) {$this->engine}");
    }

    /**
     * Yıla göre uyumluluk scope'u
     */
    public function scopeForYear(Builder $query, int $year): Builder
    {
        return $query->where('year_from', '<=', $year)
            ->where(function ($q) use ($year) {
                $q->whereNull('year_to')->orWhere('year_to', '>=', $year);
            });
    }
}
