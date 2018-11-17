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

        {{-- We use 'defer' to delay the execution of scripts until the
        DOM is ready for interaction. Also improves load times because
        downloads are now in parallel. --}}
        {{-- https://flaviocopes.com/javascript-async-defer/ --}}

        {{-- Photo Sphere Viewer dependencies from a CDN. --}}
        <script defer type="text/javascript" src="https://cdn.rawgit.com/malko/D.js/v0.7.5/lib/D.min.js"></script>
        <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/uevent@1.0.0/uevent.min.js"></script>
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dot/1.1.2/doT.min.js"></script>
        {{-- Version 98 seems to give this warning: https://github.com/mistic100/Photo-Sphere-Viewer/issues/238 --}}
        {{-- We were on 97 during the checkpoint anyway, so we'll continue
        to use that here. --}}
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/97/three.min.js"></script>
        {{-- For gyroscope support on mobile devices. --}}
        <script defer type="text/javascript" src="https://cdn.jsdelivr.net/gh/mrdoob/three.js/examples/js/controls/DeviceOrientationControls.js"></script>

        {{-- Photo Sphere Viewer assets from a CDN.--}}
        {{-- https://cdn.jsdelivr.net/npm/photo-sphere-viewer@3.4.1/dist/ --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@3.4.1/dist/photo-sphere-viewer.css">
        <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@3.4.1/dist/photo-sphere-viewer.min.js"></script>

        {{-- And we include compiled assets like this. --}}
        <script defer src="{{ asset('js/app.js') }}"></script>
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
    </body>
</html>
