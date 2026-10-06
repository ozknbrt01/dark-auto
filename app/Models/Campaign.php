<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'title',
        'discount_text',
        'is_active',
        'end_date',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'end_date' => 'datetime',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
