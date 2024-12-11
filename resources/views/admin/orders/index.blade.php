@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-column align-items-center justify-content-center">
    <h3 class="text-center">Your Restaurant hasn't any orders yet!</h3>
    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mb-3">Go back</a>
    </div>
</div>







@endsection



