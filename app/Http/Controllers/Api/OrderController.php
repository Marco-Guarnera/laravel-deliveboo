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
        $order_list = Order::all();
        return response()->json(
            [
                'success' => true,
                'results' => $order_list
            ]
        );
    }
}
