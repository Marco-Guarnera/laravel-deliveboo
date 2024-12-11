@extends('layouts.app')

<!-- Index -->
@section('content')
    <div class="container">
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
                    <th>Name</th>
                    <th class="d-none d-md-table-cell">Description</th>
                    <th>Price</th>
                    <th>Visibility</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dishes_list as $dish)
                    <tr class="align-middle">
                        <td>{{ $dish->name }}</td>
                        <td class="d-none d-md-table-cell">
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
                            <div class="d-flex gap-1">
                                <!-- Show -->
                                <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-success">Show</a>
                                <!-- Edit -->
                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning">Edit</a>
                                <!-- Delete -->
                                <form action="{{ route('admin.dishes.delete', $dish) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
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
