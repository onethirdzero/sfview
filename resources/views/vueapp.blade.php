<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SFView</title>

        {{-- Bulma.CSS. --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <script defer type="text/javascript" src="{{ asset('js/navbar-burger.js') }}"></script>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        {{-- Vue.js entrypoint. --}}
        <script type="text/javascript" src="js/vueapp.js"></script>
    </body>
</html>
