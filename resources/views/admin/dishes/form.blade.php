@extends('layouts.app')

@section('additional-script')
@vite('resources/js/dish-validation.js')
@endsection

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Title and subtitle -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">Manage Your Dish</h1>
                <p class="text-muted">Complete the form below to create or edit your dish. Fields marked with an
                    asterisk (*) are required.</p>
            </div>

            <!-- Form card -->
            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <!-- Form -->
                    <form id="dishes-form" action="@yield('form-action')" method="post" enctype="multipart/form-data">
                        @yield('form-method')
                        @csrf

                        <!-- Dish Name -->
                        <div class="mb-4">
                            <label for="dish-name" class="form-label">Dish Name *</label>
                            <input type="text" id="dish-name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $dish->name) }}" placeholder="e.g., Margherita Pizza"
                                minlength="3" maxlength="250" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Dish Description -->
                        <div class="mb-4">
                            <label for="dish-description" class="form-label">Description</label>
                            <textarea id="dish-description"
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="e.g., A delicious classic pizza..."
                                maxlength="500">{{ old('description', $dish->description) }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Dish Price -->
                        <div class="mb-4">
                            <label for="dish-price" class="form-label">Price (€) *</label>
                            <input type="number" id="dish-price"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price', $dish->price) }}" min="0" max="100" step="0.01"
                                placeholder="e.g., 12.50" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Dish Visibility -->
                        <div class="mb-4">
                            <label for="dish-visibility" class="form-label">Visibility *</label>
                            <select id="dish-visibility" class="form-select @error('is_visible') is-invalid @enderror"
                                name="is_visible" required>
                                <option value="0" @selected(old('is_visible', $dish->is_visible) == 0)>Off</option>
                                <option value="1" @selected(old('is_visible', $dish->is_visible) == 1)>On</option>
                            </select>
                            @error('is_visible')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Dish Image -->
                        <div class="mb-4">
                            <label for="dish-img" class="form-label">Image</label>
                            <input type="file" id="dish-img" class="form-control @error('img') is-invalid @enderror"
                                name="img" accept="image/*">
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">@yield('form-submit')</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
