<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DeliveBoo</title>
<!-- Style -->
<style lang="scss">



</style>

<!--Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
       <header class="d-flex justify-content-around align-items-center">

            @if (Route::has('login'))

                    @auth
                        <a class="badge bg-danger text-wrap" href="{{ url('admin/dishes') }}" >Your Restaurant's page</a>
                    @else
                        <a class="badge bg-success text-wrap" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a class="badge bg-danger text-wrap" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

            @endif


            </header>

</html>
