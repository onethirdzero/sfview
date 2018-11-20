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

<style>
<?php include "./css/app.css";?>

</style>

</head>

<body>
<div id="title"><h1>About SFView</h1></div>

<p>
<b>SFView</b> is a web application that provides users with information on different areas at Simon Fraser University. If a user says the name of a location, such as "Academic Quadrangle" or "CSIL (see-sill)", the location will appear as a photosphere with several info-points.

This tool is geared towards exploration and curiosity but is also useful for gaining information on an unfamiliar destination/location.

The app is being developed as a university assignment for SFU's CMPT470 class.

</p>

</body>

</html>
@endsection
