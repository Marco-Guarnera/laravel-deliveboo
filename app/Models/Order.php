<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'customer_email',
        'customer_number',
        'customer_address',
        'total_price',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
