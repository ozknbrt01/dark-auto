<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->hasOneThrough(
            Vendor::class,
            Product::class,
            'id', // Foreign key on products table (references product_id)
            'id', // Foreign key on vendors table (references vendor_id)
            'product_id', // Local key on reviews table
            'vendor_id' // Local key on products table
        );
    }
}
