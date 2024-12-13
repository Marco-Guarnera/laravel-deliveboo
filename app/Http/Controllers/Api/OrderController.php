<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerOrderConfirmation;
use App\Mail\RestaurantOrderNotification;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

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

        // Invia email al proprietario del ristorante
        $restaurantOwnerEmail = $order->restaurant->user->email; // Assumendo che il ristorante abbia un campo user con email
        Mail::to($restaurantOwnerEmail)->send(new RestaurantOrderNotification($order));

        // Invia email al cliente
        Mail::to($order->customer_email)->send(new CustomerOrderConfirmation($order));

        return response()->json(['success' => true, 'order' => $order], 201);
    }
}
