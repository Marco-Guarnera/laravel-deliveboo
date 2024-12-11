@extends('layouts.app')

<!-- New Order -->
@section('content')
    <h2>New order</h2>
    <ul>
        <li>Name: {{ $order->customer_name }}</li>
        <li>Email: {{ $order->customer_email }}</li>
        <li>Number: {{ $order->customer_number }}</li>
        <li>Address: {{ $order->customer_address }}</li>
    </ul>
@endsection
