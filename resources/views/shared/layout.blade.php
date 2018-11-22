{{-- This is our layout template. --}}
{{-- https://laravel.com/docs/5.7/blade#template-inheritance --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>SFView - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Turns out that we pass the CSRF token like this. --}}
        {{-- https://laracasts.com/discuss/channels/general-discussion/laravel-5-posting-javascript-to-controller-wont-work --}}
        <meta name="csrf-token" content="{!! Session::token() !!}">

        {{-- Styles go here. --}}
        @include('shared.styles')
        {{-- Scripts go here. --}}
        @include('scripts')
        <script defer type="text/javascript" src="{{ asset('js/navbar-burger.js') }}"></script>
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
        @yield('content')
    </body>
</html>
