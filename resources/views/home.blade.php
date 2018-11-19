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
<div class="panorama" id="viewer" style="width: 100vw; height: 90vh;"></div>

<div>
    <p>Press space to speak a new location!</p>
    <p id="voice-input-result" style="font-style: italic;">...diagnostic messages</p>
</div>
@endsection
