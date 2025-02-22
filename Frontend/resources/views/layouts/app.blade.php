<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    @include('partials._header')
    </head>
    <body>
    @include('partials._navbar')
            <main>
            @if (auth()->check())
             @include('partials._sidebar') 
             @endif  
            @yield('content')
            </main>
            @include('partials._footer')
    </body>
</html>
