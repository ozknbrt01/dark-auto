<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_brand_id',
        'car_model_id',
        'car_engine_id',
        'model_name',
        'engine_name',
        'plate_number',
        'color',
        'year',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function carBrand() { return $this->belongsTo(CarBrand::class); }
    public function carModel() { return $this->belongsTo(CarModel::class, 'car_model_id'); }
    public function carEngine() { return $this->belongsTo(CarEngine::class, 'car_engine_id'); }
}
