<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading"><em>404</em></h1>
                <hr>
                <p class="lead"><strong><em>Cette page n'existe pas.</em></strong></p>
                <a href="{{route('index')}}" class="btn btn-primary btn-xl page-scroll">OK</a>
            </div>
        </div>
    </header>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>