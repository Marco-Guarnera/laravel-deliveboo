@extends('layouts.app')

<!-- New Order -->
@section('content')
    <h2>New order</h2>
    <ul>
        <li>Name: {{ $order->name }}</li>
        <li>Email: {{ $order->email }}</li>
        <li>Number: {{ $order->number }}</li>
        <li>Address: {{ $order->address }}</li>
    </ul>
@endsection
