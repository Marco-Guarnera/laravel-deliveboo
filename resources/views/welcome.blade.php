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
        <div>
    <body>
        <header id="welcome-header" class="d-flex justify-content-between align-items-center p-3">

            <h3 class="text-dark fw-bold">DeliveBoo - Administration Area</h3>

        </main>



    </div>
</body>
</header>
<main id="welcome-main">
    <div class="mt-5">
        <h1 class="text-center">Join us and start managing your business! </h1>
        <h2 class="text-center">Discover your restaurant's statistics and personalize your menu.</h2>
        @if (Route::has('login'))
            <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                @auth
                    <a class="btn btn-danger btn-lg text-white" href="{{ route('admin.dishes.index') }}">Your Restaurant's page</a>
                @else
                    <a class="btn btn-success btn-lg text-white" href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a class="btn btn-danger btn-lg text-white" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</main>


</html>
