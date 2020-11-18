<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Juans Auto Paint</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    </head>
    <body class="antialiased">
        <div class="wrapper">
            @include('includes.header')
            @include('includes.nav')
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
