<?php

namespace App\Models;

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
        'img'
    ];









    /**
     * Get the restaurant that owns the dish.
     *
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
