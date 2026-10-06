<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarEngine extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'year_start' => 'integer',
        'year_end' => 'integer',
    ];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function getFullTitleAttribute(): string
    {
        $brand = $this->carModel->brand->name;
        $model = $this->carModel->name;
        $yearRange = $this->year_end ? "{$this->year_start}-{$this->year_end}" : "{$this->year_start}+";
        return trim("{$brand} {$model} ({$yearRange}) {$this->engine_type} {$this->fuel_type}");
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
