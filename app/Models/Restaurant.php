<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'piva',
        'logo',
        'user_id'
    ];

    /**
     * Mutator to automatically generate the slug from the  restaurant name.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    /**
     * Get the user that owns the restaurant.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the associated types.
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    /**
     * Relationship with the associated dishes.
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
