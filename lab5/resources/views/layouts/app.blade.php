<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name','THE LARAVEL STARTER')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        @include('inc.footer')
    </body>
</html>
