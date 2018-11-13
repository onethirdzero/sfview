<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>SFView</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- https://laracasts.com/discuss/channels/general-discussion/laravel-5-posting-javascript-to-controller-wont-work -->
        <!-- Turns out that we pass the CSRF token like this. -->
        <meta name="csrf-token" content="{!! Session::token() !!}">
    </head>
    <body>
        <button id="voice-input-button">Speak a new location!</button>
        <!-- And we include compiled assets like this. -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
