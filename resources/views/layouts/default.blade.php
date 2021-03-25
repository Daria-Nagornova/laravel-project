<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mom and baby</title>
        <meta name="description" content="Самый полезный сайт для мам и малышей">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="animsition">
            @include('layouts.blocks.header')
            @yield('content')
            @include('layouts.blocks.footer')
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
