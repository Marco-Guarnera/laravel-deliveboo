<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_visible',
        'img',
        'restaurant_id'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => ucfirst(strtolower($value))
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn(null|string $value) => $value ? ucfirst($value) : null
        );
    }

    /**
     * Get the restaurant that owns the dish.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}