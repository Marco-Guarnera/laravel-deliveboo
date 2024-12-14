<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('restaurant')->latest()->paginate(10); // Recupera gli ordini con il ristorante associato
        return view('admin.orders.index', compact('orders')); // Passa la variabile alla vista
    }
}
