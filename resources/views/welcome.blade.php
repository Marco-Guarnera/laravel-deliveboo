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
        <header class="d-flex justify-content-between align-items-center p-3">

            <h3 class="text-success fw-bold">DeliveBoo</h3>


            @if (Route::has('login'))
                <div class="d-flex align-items-center">
                    @auth

                        <a class="btn btn-danger text-white ms-3" href="{{ url('admin/dishes') }}">Your Restaurant's page</a>
                    @else

                        <a class="btn btn-success text-white ms-3" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))

                            <a class="btn btn-danger text-white ms-3" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>

        </body>
        </html>


</html>
