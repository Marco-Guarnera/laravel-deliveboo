@extends('layouts.app')

<!-- Index -->
@section('content')
<div class="container">

    <!-- Messaggio in caso non ci siano piatti -->
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
    <!-- Session Data -->
    <div class="row">
        <div class="col-3 mx-auto">
            @include('partials.session-data')
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <!-- Create -->
        <a href="{{ route('admin.dishes.create') }}" class="btn mb-3"><i
                class="icon-create fa-solid fa-plus fa-2x"></i></a>

        <!-- Table -->
        <a href="{{route('admin.orders.index')}}" class="btn btn-success mb-3">Order Section</a>
    </div>

    <!-- Orders -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th class="d-none d-sm-table-cell">Name</th>
                <th>Price</th>
                <th>Visibility</th>
                <th>Functions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
            @forelse ($restaurant->dishes as $dish)
            <tr class="align-middle">
                <td>
                    <img class="img-dish" src="{{ asset('/storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                </td>
                <td class="d-none d-sm-table-cell">{{ $dish->name }}</td>
                <td>{{ $dish->price . '€' }}</td>
                <td>
                    @if ($dish->is_visible)
                    <i class="fa-solid fa-check fa-xl"></i>
                    @else
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    @endif
                </td>
                <td>
                    <!-- Edit -->
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn">
                        <i class="icon-edit fa-solid fa-pen-to-square fa-xl"></i>
                    </a>
                    <!-- Delete -->
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $dish->id }}">
                        <i class="icon-delete fa-solid fa-trash fa-xl"></i>
                    </button>
                </td>
            </tr>

            <!-- Modal for Delete -->
            <div class="modal fade" id="deleteModal{{ $dish->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $dish->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $dish->id }}">{{ $dish->name }}</h5>
                        </div>
                        <div class="modal-body">Are you sure you want to delete this dish? This operation is not
                            reversible.</div>
                        <div class="modal-footer">
                            <!-- Delete -->
                            <form action="{{ route('admin.dishes.delete', $dish) }}" method="POST"
                                style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <!-- Cancel -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div>Not Available</div>
            @endforelse
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center mt-4">
        <p>No dishes available. Add new dish!</p>
        <a href="{{ route('admin.dishes.create') }}" class="btn mb-3"><i class="fa-solid fa-plus fa-2x"></i></a>
    </div>
    @endif
</div>

@endsection
