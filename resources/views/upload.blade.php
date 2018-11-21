{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Include scripts that we need. --}}
@section('scripts')
    @include('scripts')
@endsection


<head>
    <style>
        <?php include "./css/app.css";?>
    </style>
</head>

{{-- Fill in our content. --}}
@section('content')

    <section class="section">
        <div class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h3 class="title">{{ __('Upload Panorama') }}</h3>

                    <form method="POST" action="{{ route('upload') }}">
                        @csrf

                        <div class="field">
                            <label class="label" for="location">{{ __('Location Name') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('location') ? 'is-danger' : '' }}
                                        id="location" type="text" name="location" value="{{ old('location') }}"
                                required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="filename">{{ __('File') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('filename') ? 'is-danger' : '' }}
                                        id="filename" type="file" name="filename" value="{{ old('filename') }}"
                                required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="diction">{{ __('Phrases (comma delimited)') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('diction') ? 'is-danger' : '' }}
                                        id="diction" type="text" name="diction" value="{{ old('diction') }}"
                                required autofocus>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-primary" type="submit">
                                    {{ __('Upload') }}
                                </button>
                                <button class="button is-link" type="submit">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</head>


</html>
@endsection

<!--
<body style="background-color: antiquewhite">

    <div class="formDiv">
        <form action="./panoramaInfo/panoramaUpload.php" method="post" name = "UploadFrom" onsubmit="return validateUpload()" enctype="multipart/form-data">
        <fieldset>
          <legend>New Panorama</legend>
          <div class="form-group row">
            <label class="col-lg-3">Location Name: </label>
            <input class="col-lg-9" type="text" class="form-control" name = 'location' id="location">
          </div>
          <div class="form-group row">
            <label class="col-lg-3" for="password">Panorama: </label>
            <input class="col-lg-9" type="file" name="pan" id="pan">
          </div>
          <button type="button" onclick="addMarkerField()" class="btn btn-primary">Add Marker</button>
          <div id="markersDiv">
            <input id = "number" class="number" type="hidden" name="number" value=0>
          </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</body>

  <script type='text/javascript'>
      var number = 0;
      function addMarkerField(){
          number++;
          var container = document.getElementById("markersDiv");
          var newMarker = document.createElement("input");
          newMarker.name = "Marker[]";
          container.appendChild(document.createTextNode("Marker"));
          container.appendChild(newMarker);
          container.appendChild(document.createElement("br"));
          document.getElementById('number').value = number;
      }
      function validateUpload() {
        var x = document.forms["UploadFrom"]["location"].value;
        var y = document.forms["UploadFrom"]["pan"].value;
        if (x == "") {
            alert("location name must be filled out");
            return false;
        }
        if (y == "") {
            alert("You must upload the file!");
            return false;
        }
      }
  </script>
-->