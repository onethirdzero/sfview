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

<?php
if (!is_null(Auth::user()))
{
    echo "<p style='font-size: 20px; padding-left: 10px; font-weight: bold;'>Welcome ".Auth::user()->name."!</p>";
}
?>

<div class="panorama" id="viewer" style="width: 100vw; height: 90vh;"></div>

<div>
    <p>Press space to speak a new location!</p>
    <p id="voice-input-result" style="font-style: italic;">...diagnostic messages</p>
</div>
@endsection
