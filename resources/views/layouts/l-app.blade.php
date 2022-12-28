<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="wrapper">
        @include('components.header')
        <main class="main">
            @yield('main')
        </main>
        @include('components.footer')
    </div>
    @yield('js')
</body>
</html>