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


<script>
console.log("inside panorama file");
</script>

<link rel="stylesheet" href="./css/app.css">
<div class="panorama" id="view5" style="width: 100vw; height: 90vh;"></div>

<script>
var imagePath = <?php echo "'"."/panoramas/".$wildcard_filename."'"; ?>;
console.log(imagePath);
</script>


@endsection