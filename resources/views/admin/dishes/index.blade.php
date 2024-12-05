@extends('layouts.app')

<!-- Index -->
@section('content')
<div class="container-fluid">


<!--Messaggio in caso non ci siano piatti-->
@php

$hasDishes = false;
foreach ($restaurants as $restaurant) {
    if ($restaurant->dishes->isNotEmpty()) {
        $hasDishes = true;
        break;
    }
}
@endphp



@if ($hasDishes)
<a href="{{ route('admin.dishes.create') }}" class="btn btn-primary mb-3">Create</a>
    <!-- Table -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Visibility</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
            @forelse ($restaurant->dishes as $dish)
            <tr class="align-middle">
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->description }}</td>
                <td>{{ $dish->price }}</td>
                <td>{{ $dish->is_visible }}</td>
                <td>
                    <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.dishes.delete', $dish) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <div>Not Available</div>
            @endforelse
            @endforeach
        </tbody>
    </table>
    @else
<div class="text-center mt-4">
    <p>No dishes available. Start inserting your dishes!</p>
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary mb-3">Add a new dish!</a>
</div>
    @endif

</div>
@endsection
