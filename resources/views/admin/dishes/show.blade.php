@extends('layouts.app')

<!-- Show -->
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mx-auto">
                <!-- Card -->
                <div class="card">
                    @isset($dish->img)
                        <img src="..." class="card-img-top" alt="...">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title">{{ $dish->name }}</h5>
                        <p class="card-text">{{ $dish->description }}</p>
                        <span class="card-text">{{ $dish->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
