<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_number' => 'required|string|max:10',
            'customer_address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        $order = Order::create($validatedData);

        return response()->json(['success' => true, 'order' => $order], 201);
    }
}
