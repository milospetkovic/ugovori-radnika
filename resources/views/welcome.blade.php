<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif

        <div class="content">

            <div>
                <a class="btn btn-info" href={{ action('Company\CompanyController@create') }}>Unos komitenta</a>
            </div>

            <div>
                <a class="btn btn-info" href={{ action('Company\CompanyController@listCompanies') }}>Lista unetih komitenta</a>
            </div>

            {{--
            <div class="title m-b-md">
                Elitasoft -> FERDIL Application
            </div>

            <div class="links">
                <img src="https://www.elitasoft.com/img/elitasoft.png" class="img-responsive img-rounded" style="max-width: 250px;">
            </div>
            --}}
        </div>
    </div>
</body>
</html>
