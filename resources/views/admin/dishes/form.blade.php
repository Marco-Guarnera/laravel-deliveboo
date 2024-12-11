@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Errors -->
                @include('partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-auto">
                <!-- Form -->
                <form action="@yield('form-action')" method="post" enctype="multipart/form-data">
                    @yield('form-method')
                    @csrf
                    <!-- Dish Name -->
                    <label for="dish-name" class="form-label">Name:</label>
                    <input type="text" id="dish-name" class="form-control" name="name" value="{{ old('name', $dish->name) }}" placeholder="Name" autofocus required>
                    <!-- Dish Description -->
                    <label for="dish-description" class="form-label">Description:</label>
                    <textarea id="dish-description" class="form-control" name="description" rows="5" placeholder="Description">{{ old('description', $dish->description) }}</textarea>
                    <!-- Dish Price -->
                    <label for="dish-price" class="form-label">Price:</label>
                    <input type="number" id="dish-price" class="form-control w-25" name="price" value="{{ old('price', $dish->price) }}" min="0" max="100" step="0.01" placeholder="€" required>
                    <!-- Dish Visibility -->
                    <label for="dish-vis" class="form-label">Visibility:</label>
                    <select id="dish-vis" class="form-select w-25" name="is_visible">
                        <option value="0" @selected(old('is_visible', $dish->is_visible))>Off</option>
                        <option value="1" @selected(old('is_visible', $dish->is_visible))>On</option>
                    </select>
                    <!-- Dish Img -->
                    <label for="dish-img" class="form-label">Image:</label>
                    <input type="file" id="dish-img" class="form-control" name="img">
                    <!-- Btns -->
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">@yield('form-submit')</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
