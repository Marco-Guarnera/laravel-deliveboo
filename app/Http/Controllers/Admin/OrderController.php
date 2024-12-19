<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $user = auth()->user(); // Recupera l'utente loggato
        $orders = Order::whereHas('restaurant', function ($query) use ($user) {
            $query->where('user_id', $user->id); // Filtra i ristoranti dell'utente loggato
        })
            ->with('restaurant') // Carica il ristorante associato
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders')); // Passa gli ordini filtrati alla vista
    }


    public function statistics()
    {
        // Ottieni i ristoranti dell'utente loggato
        $restaurants = Auth::user()->restaurants->pluck('id');

        // Aggrega gli ordini dei ristoranti dell'utente loggato
        $orders = DB::table('orders')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_sales')
            ->whereIn('restaurant_id', $restaurants)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return view('admin.orders.statistics', compact('orders'));
    }

    public function show($id)
    {

        $orders = Order::findOrFail($id);
        return view('admin.orders.show', compact('orders'));
    }
}
