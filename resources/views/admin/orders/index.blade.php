@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Orders List</h1>
    <!-- Bottone per visualizzare le statistiche -->
    <a href="{{ route('admin.orders.statistics') }}" class="btn btn-primary mb-4">See statistics</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Total Price</th>
                <th>Creation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>&euro; {{ number_format($order->total_price, 2) }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Details</a> --}}
                    {{-- <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No order was found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginazione -->
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection
