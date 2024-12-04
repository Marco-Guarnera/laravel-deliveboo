<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'piva',
        'logo',
    ];

    /**
     * Get the types associated with the restaurant.
     *
     * Defines a many-to-many relationship with the Type model.
     *
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    /**
     * Get the user that owns the restaurant.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the dishes associated with the restaurant.
     *
     */
    public function  dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
