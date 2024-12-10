<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Index
    public function index()
    {
        $orders_list = Order::all();
        return response()->json(
            [
                'success' => true,
                'results' => $orders_list
            ]
        );
    }
}
