@extends('layouts.app')

@section('content')


<div class="container mt-5">
   <h1 class="text-center">Order Details</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Order Details Card -->
            <div class="card shadow-sm">


                <!-- Card Body -->
                <div class="card-body">
                    <!-- Customer Information -->
                    <h6 class="text-muted mb-3">Customer Information</h6>
                    <p><strong>Name:</strong> {{ $orders->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $orders->customer_email }}</p>
                    <p><strong>Address:</strong> {{ $orders->customer_address }}</p>

                    <hr>

                    <!-- Order Summary -->
                    <h6 class="text-muted mb-3">Order Summary</h6>
                    <p><strong>Order ID:</strong> #{{ $orders->id }}</p>
                    <p><strong>Restaurant:</strong> {{ $orders->restaurant->name }}</p>
                    <p><strong>Total Price:</strong> ${{ number_format($orders->total_price, 2) }}</p>



                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection
