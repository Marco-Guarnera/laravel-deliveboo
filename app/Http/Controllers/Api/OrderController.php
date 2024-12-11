<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {
    // Store
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'customer_name' => ['required', 'string', 'min:2', 'max:250'],
            'customer_email' => ['required', 'email', 'min:6', 'max:250'],
            'customer_number' => ['required', 'numeric', 'integer', 'size:10'],
            'customer_address' => ['required', 'string', 'min:10', 'max:250']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {
            $order = Order::create($validator->validated());
            Mail::to('admin@gmail.com')->send(new NewOrder($order));
            return response()->json([
                'success' => true
            ]);
        }
    }

    // Index
    public function index() {
        $orders_list = Order::all();
        return response()->json([
                'success' => true,
                'results' => $orders_list
            ]);
    }
}
