@extends('layouts.app')

@section('Title', 'Not Authorized!')

@section('content')
<div class="error-page text-center">
    <h1>403</h1>
    <h2 class="text-danger text-center">Access Denied</h2>
    <p>You aren't authorized to visualize this content.</p>
    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mt-3">Go Back</a>
</div>
@endsection
