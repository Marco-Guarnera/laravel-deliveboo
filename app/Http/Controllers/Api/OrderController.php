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
            // 'transaction_id' => 'required|string',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:dishes,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric|min:0',

        ]);

        // Creazione dell'ordine
        $order = Order::create([
            'restaurant_id' => $validatedData['restaurant_id'],
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
            'customer_number' => $validatedData['customer_number'],
            'customer_address' => $validatedData['customer_address'],
            'total_price' => $validatedData['total_price'],
            // 'transaction_id' => $validatedData['transaction_id'],
        ]);

        // Associazione dei piatti alla tabella pivot con dettagli extra
        foreach ($validatedData['items'] as $item) {
            $order->dishes()->attach($item['id'], [
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'name' => $item['name'], // Aggiunge il nome direttamente nella pivot
            ]);
        }

        // Invia email al ristorante e al cliente
        $restaurantOwnerEmail = $order->restaurant->user->email;
        Mail::to($restaurantOwnerEmail)->send(new RestaurantOrderNotification($order));
        Mail::to($order->customer_email)->send(new CustomerOrderConfirmation($order));

        return response()->json(['success' => true, 'order' => $order], 201);
    }
}
