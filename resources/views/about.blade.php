{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Include scripts that we need. --}}
@section('scripts')
    @include('scripts')
@endsection

{{-- Fill in our content. --}}
@section('content')

<html>

<head>
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
<div style="margin:30px">
    <div id="title"><h1>About SFView</h1></div>
    <p>
    <b>SFView</b> is a web application that provides users with information on different areas at Simon Fraser University.
        If a user says the name of a location, such as "Academic Quadrangle" or "CSIL (see-sill)", the location will appear
        as a photosphere with several info-points.
    </p>
    <p>This tool is geared towards exploration and curiosity but is also useful for gaining information on an unfamiliar destination/location.</p>
    <p>The app is being developed as a university assignment for SFU's CMPT470 class.</p>

    <h3>Authors:</h3>

    <ul style="list-style-type:disc;margin-left:30px">
        <li>Jordan Siaw</li>
        <li>Heidi Tong</li>
        <li>Gavin Xu</li>
        <li>Curtis Babnik</li>
    </ul>

    <h3>Contact:</h3>
    If you have any questions regarding this site or its code, feel free to contact <a href="mailto:cbabnik@sfu.ca">cbabnik@sfu.ca</a>
</div>

</body>

</html>
@endsection
