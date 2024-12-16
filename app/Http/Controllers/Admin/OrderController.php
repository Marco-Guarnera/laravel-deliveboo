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

    public function statistics()
    {
        // Recupera gli ordini per mese e anno
        $orders = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_sales')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('admin.orders.statistics', compact('orders'));
    }
}
