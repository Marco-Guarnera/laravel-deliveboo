@extends('layouts.app')

<!-- Index -->
@section('content')
<div class="container-fluid">

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
    <!-- Create and order section buttons -->
    <div class="d-flex justify-content-between">
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary mb-3">Add a new dish!</a>
    <a href="{{route('admin.orders.index')}}" class="btn btn-success mb-3">Order Section</a>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
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

                <td>{{ $dish->name }}</td>
                <td>
                    @php
                    if ($dish->description) echo $dish->description;
                    else echo 'No description';
                    @endphp
                </td>
                <td>{{ $dish->price . '€' }}</td>
                <td>
                    @php
                    if ($dish->is_visible) echo 'On';
                    else echo 'Off';
                    @endphp
                </td>
                <td>
                    <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning">Edit</a>
                    <!-- Delete button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $dish->id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Modal for delete -->
            <div class="modal fade" id="deleteModal{{ $dish->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $dish->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $dish->id }}">Delete Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <strong>{{ $dish->name }}</strong>? This operation is not reversible.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep this
                                dish</button>

                            <!-- Delete form -->
                            <form method="POST" action="{{ route('admin.dishes.delete', $dish) }}"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
        <p>No dishes available. Start inserting your dishes!</p>
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary mb-3">Add a new dish!</a>
    </div>
    @endif

</div>
@endsection
@section('scripts')


@endsection
