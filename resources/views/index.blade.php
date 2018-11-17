{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Fill in our content. --}}
@section('content')
{{-- Sample. --}}
<div class="panorama" id="viewer" style="width: 100%; height: 90%;"></div>
<p>Press space and speak a new location!</p>
@endsection
