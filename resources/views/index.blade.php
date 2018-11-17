{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Fill in our content. --}}
@section('content')
<div class="panorama" id="viewer" style="width: 100%; height: 90%;"></div>

<div>
    <p>Press space to speak a new location!</p>
    <p id="voice-input-result" style="font-style: italic;">...diagnostic messages</p>
</div>
@endsection
