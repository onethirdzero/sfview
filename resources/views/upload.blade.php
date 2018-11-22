{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Include scripts that we need. --}}
@section('scripts')
    @include('scripts')
@endsection


<head>
        <link rel="stylesheet" href="./css/app.css">
</head>
{{-- Fill in our content. --}}
@section('content')

<link rel="stylesheet" href="./css/app.css">

    <section class="section">
        <div class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-half">
                    <h3 class="title" style='color: #A6192E'>{{ __('Upload Panorama') }}</h3>

                    <form method="POST" action="/php/panoramaUpload.php" enctype="multipart/form-data" >
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
                            <label class="label" for="pan">{{ __('Panorama File') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('file') ? 'is-danger' : '' }}
                                        id="pan" type="file"name="pan" value='pan'
                                        style="height:40px;"
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
                                <button class="button is-primary" type="submit" style='background-color: #A6192E'>
                                    {{ __('Upload') }}
                                </button>
                                <button class="button is-link" type="submit" style='color: black; background-color: lightgrey'>
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