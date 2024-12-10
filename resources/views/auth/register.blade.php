@extends('layouts.app')


<!-- Additional scripts -->
@section('additional-script')
@vite('resources/js/user-validation.js')
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <!-- Register form -->
                    <form id="register-form" method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Input for restaurant name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                Restaurant name *
                            </label>
                            <div class="col-md-6">
                                <!-- Input field for restaurant name -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus required
                                    maxlength="40">


                                <!-- Error message for restaurant name -->
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
                                <!-- Input field for restaurant address -->
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" autocomplete="address" autofocus required minlength="5"
                                    maxlength="200">

                                <!-- Error message for restaurant address -->
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for restaurant P.IVA -->
                        <div class="row mb-3">
                            <label for="piva" class="col-md-4 col-form-label text-md-end">
                                Restaurant piva *
                            </label>
                            <div class="col-md-6">
                                <!-- Input field for P.IVA -->
                                <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror"
                                    name="piva" value="{{ old('piva') }}" autocomplete="piva" autofocus required
                                    pattern="\d{11}" title="La P.IVA deve essere composta da 11 caratteri numerici.">

                                <!-- Error message for P.IVA -->
                                @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- //Input for restaurant logo
                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-end">
                                Restaurant logo
                            </label>
                            <div class="col-md-6">
                                // Input field for restaurant logo
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror"
    name="logo" accept="image/*" title="Accepted formats: jpg, jpeg, png, gif">

                                // Error message for restaurant logo
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    -->

                        <!-- Input for restaurant types -->
                        <div class="row mb-3">
                            <label for="types-group" class="col-md-4 col-form-label text-md-end">
                                Restaurant type(s) *
                            </label>
                            <div id="types-group" class="col-md-6">
                                <!-- Dynamically generated checkboxes for restaurant types -->
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

                                <!-- Error message for types -->
                                @error('types')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for email -->
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address *') }}</label>

                            <div class="col-md-6">
                                <!-- Input field for email -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email" required
                                    maxlength="255">

                                <!-- Error message for email -->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for password -->
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <!-- Input field for password -->
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" required minlength="8">

                                <!-- Error message for password -->
                                @error('password')
                                <span class="invalid-feedback w-100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input for confirm password -->
                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <!-- Input field for confirm password -->
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password" required>

                                <!-- Error message for confirm password -->
                                @error('password_confirmation')
                                <span class="invalid-feedback w-100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit button -->
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
