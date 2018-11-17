{{-- This is our layout template. --}}
{{-- https://laravel.com/docs/5.7/blade#template-inheritance --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>SFView - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- https://laracasts.com/discuss/channels/general-discussion/laravel-5-posting-javascript-to-controller-wont-work --}}
        {{-- Turns out that we pass the CSRF token like this. --}}
        <meta name="csrf-token" content="{!! Session::token() !!}">
    </head>
    <body>
        {{-- Nav sub-view goes here. --}}
        {{-- https://laravel.com/docs/5.7/blade#including-sub-views --}}
        @include('shared.nav')

        {{-- Shim for outdated browsers. --}}
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        {{-- Content section goes here. --}}
        <div class="container">
            @yield('content')
        </div>

        {{-- And we include compiled assets like this. --}}
        <script src="{{ asset('/js/app.js') }}"></script> --}}
    </body>
</html>
