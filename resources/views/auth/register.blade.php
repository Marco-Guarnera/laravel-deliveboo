@extends('layouts.app')

@section('additional-script')
@vite('resources/js/user-validation.js')
@endsection

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <!-- Title and subtitle -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">Start Your Journey with Us</h1>
                <p class="text-muted">Complete the form below to get started. All fields marked with an asterisk (*) are
                    required.</p>
            </div>

            <!-- Form card -->
            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <!-- Register Form -->
                    <form id="register-form" method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Section Restaurant Details -->
                        <h5 class="fw-bold mb-3">Restaurant Details</h5>

                        <!-- Input for restaurant name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Restaurant Name *</label>
                            <!-- Input field for restaurant name -->
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="e.g., Joe's Italian" required
                                maxlength="40">
                            <!-- Error message for restaurant name -->
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Input for restaurant address -->
                        <div class="mb-4">
                            <label for="address" class="form-label">Restaurant Address *</label>
                            <!-- Input field for restaurant address -->
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" placeholder="e.g., 123 High Street" required
                                minlength="5" maxlength="200">
                            <!-- Error message for restaurant address -->
                            @error('address')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Input for VAT Number (P.IVA) -->
                        <div class="mb-4">
                            <label for="piva" class="form-label">VAT Number (P.IVA) *</label>
                            <!-- Input field for VAT Number -->
                            <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror"
                                name="piva" value="{{ old('piva') }}" placeholder="e.g., 12345678901" required
                                pattern="\d{11}">
                            <!-- Error message for VAT Number -->
                            @error('piva')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Input for restaurant types -->
                        <div class="mb-4">
                            <label for="types-group" class="form-label">Restaurant Type(s) *</label>
                            <div id="types-group" class="d-flex flex-wrap gap-2">
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
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>


                        <!-- //Input for restaurant logo
<div class="row mb-3">
    <label for="logo" class="col-md-4 col-form-label text-md-end">
        Restaurant logo *
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

                        <!-- Section Account Details -->
                        <h5 class="fw-bold mb-3">Account Details</h5>

                        <!-- Input for email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address *</label>
                            <!-- Input field for email -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="e.g., enquiries@example.com"
                                required maxlength="255">
                            <!-- Error message for email -->
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Input for password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password *</label>
                            <!-- Input field for password -->
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Minimum 8 characters" required minlength="8">
                            <!-- Error message for password -->
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- Input for confirm password -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password *</label>
                            <!-- Input field for confirm password -->
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Re-enter your password" required>
                        </div>

                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection