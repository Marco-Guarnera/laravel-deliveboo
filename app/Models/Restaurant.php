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
        'user_id'
    ];


    /**
     * Get the user that owns the restaurant.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }


    public function  dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
