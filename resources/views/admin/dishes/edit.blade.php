<!-- Edit -->
@extends('admin.dishes.form')

@section('form-action')
    {{ route('admin.dishes.update', $dish) }}
@endsection

@section('form-method')
    @method('put')
@endsection

@section('form-submit', 'Update')
