<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    @include('partials._header')
    </head>
    <body>
    @include('partials._property-navbar')
            <main> 
            @yield('content')
            </main>
            @include('partials._footer')
    </body>
</html>