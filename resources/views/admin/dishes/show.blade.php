@extends('layouts.app')

<!-- Show -->
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mx-auto">
                <!-- Card -->
                <div class="card">
                    @isset($dish->img)
                        <img class="card-img-top" src="{{ asset('/storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $dish->name }}</h5>
                        <p class="card-text mb-3">{{ $dish->description }}</p>
                        <span class="card-text d-block mb-3"><strong>Price:</strong> €{{ number_format($dish->price, 2) }}</span>
                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
