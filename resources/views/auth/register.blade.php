@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <!-- Register form -->
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Input for restaurant name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                Restaurant name *
                            </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for restaurant address -->
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">
                                Restaurant address *
                            </label>
                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for restaurant piva -->
                        <div class="row mb-3">
                            <label for="piva" class="col-md-4 col-form-label text-md-end">
                                Restaurant piva *
                            </label>
                            <div class="col-md-6">
                                <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror"
                                    name="piva" value="{{ old('piva') }}" required autocomplete="piva" autofocus>

                                @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for restaurant logo -->
                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-end">
                                Restaurant logo *
                            </label>
                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror"
                                    name="logo" autofocus>

                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--Restaurant type selection   -->
                        <div class="row mb-3">
                            <label for="types" class="col-md-4 col-form-label text-md-end">Restaurant type(s)</label>
                            <div class="col-md-6">
                                @foreach ($types as $type)
                                <div class="form-check">
                                    <input class="form-check-input @error('types') is-invalid @enderror" type="checkbox"
                                        name="types[]" value="{{ $type->id }}" id="type_{{ $type->id }}"
                                        {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type_{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-script')

@vite('resources/js/app.js')

@endsection