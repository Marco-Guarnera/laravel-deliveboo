<!-- Create -->
@extends('admin.dishes.form')

@section('form-action')
    {{ route('admin.dishes.store') }}
@endsection

@section('form-method')
    @method('post')
@endsection

@section('form-submit', 'Create')
