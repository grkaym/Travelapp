<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- fotns --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- slick --}}
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="wrapper">
        @include('components.header')
        <main class="main">
            <div class="main__container">
                @yield('main')
            </div>
        </main>
        @include('components.footer')
    </div>
    @yield('js')
    <script src="{{'/assets/js/main.js'}}"></script>
</body>
</html>