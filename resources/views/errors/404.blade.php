@extends('layouts.app')

@section('Title', 'Content Not Found!')

@section('content')
<div class="error-page text-center">
    <h1>404</h1>
    <h2 class="text-danger text-center">Not Found!</h2>
    <p>The page you are looking for doesn't exist.</p>
    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mt-3">Go Back</a>
</div>
@endsection
