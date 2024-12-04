@extends('layouts.app')

<!-- Index -->
@section('content')
    <div class="container-fluid">
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
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-success">Show</a>
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
