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

            <h3 class="text-success fw-bold">DeliveBoo</h3>


            @if (Route::has('login'))
                <div>
                <div class="d-flex align-items-center">
                    @auth


                        <a class="btn btn-danger text-white ms-3" href="{{ route('admin.dishes.index') }}">Your Restaurant's page</a>
                    @else

                        <a class="btn btn-success text-white ms-3" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))

                            <a class="btn btn-danger text-white ms-3" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>
    </body>
        </header>
        <main id="welcome-main">
            <div class="d-flex justify-content-between">
         <div id="text-container-1">
            <h3 class="text-success">Create your account</h3>
         </div>
         <div id="text-container-2">
           <h3 class="text-success">Insert all your dishes</h3>
         </div>
            </div>
<div id="welcome-image">
    <img src="https://img.freepik.com/free-psd/free-food-service-arrangement-with-background-mock-up_23-2148421299.jpg?size=626&ext=jpg" alt="">
</div>
        </main>

        </body>
        </html>


</html>
