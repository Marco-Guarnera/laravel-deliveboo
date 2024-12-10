<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // get the currently authenticated user
        $user = auth()->user();

        return view('admin.orders.index');
    }
}
