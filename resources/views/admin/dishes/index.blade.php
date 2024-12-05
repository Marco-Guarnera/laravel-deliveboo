@extends('layouts.app')

<!-- Index -->
@section('content')
    <div class="container-fluid">
        <!-- Session Data -->
        <div class="row">
            <div class="col-3 mx-auto">
                @include('partials.session-data')
            </div>
        </div>
        <!-- Create -->
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
                @forelse ($dishes_list as $dish)
                    <tr class="align-middle">
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->price }}</td>
                        <td>{{ $dish->is_visible }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-success">Show</a>
                            <!-- Edit -->
                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning">Edit</a>
                            <!-- Delete -->
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
            </tbody>
        </table>
        <div>{{ $dishes_list->links() }}</div>
    </div>
@endsection
