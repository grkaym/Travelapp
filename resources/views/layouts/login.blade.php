<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>travel</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/auth/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/auth/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="wrapper">
        @include('components.login_header')

        <main class="main auth">
            <div class="container">
                <div class="row">
                    <div class="col-11 col-lg-10 jumbotron mx-auto mt-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>
