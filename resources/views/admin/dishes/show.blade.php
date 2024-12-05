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
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <span class="card-text">{{ $dish->price }}</span>

                    </td>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
