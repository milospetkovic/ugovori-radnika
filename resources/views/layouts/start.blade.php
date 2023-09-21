<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>START layout{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="/css/elitasoft.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>

<div id="app">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('header')

    <div class="container">
        <div class="row">

            @include('flash::message')

            <app></app>

        </div>
    </div>

</div>

{{--<script src="{{ mix('/js/app.js') }}"></script> --}}
{{-- <script src="/js/moment-timezone-with-data.min.js"></script> --}}
<script src="/js/moment-with-locales.min.js"></script>
<script src="/js/bootstrap-datetimepicker.min.js"></script>

@yield('pagescript')
@yield('scripts')

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(2000).fadeOut(350);
    $('.show-inactive').click(function() {
        $(this).closest('form').submit();
    });
    $(".dropdown-toggle").dropdown();
</script>

</body>
</html>
