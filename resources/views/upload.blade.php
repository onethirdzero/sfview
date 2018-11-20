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

<!DOCTYPE html>
<html>
<head>
    <!-- used to be panoramaForm -->
    <title>Add Panorama</title>
    <!-- use bootswatch-->
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/vendor/bootstrap.css">

  <style>
    .formDiv {
      padding: 20px;
      margin: 50px;
      background-color: lightskyblue;
      max-width: 750px;
    }
  </style>

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

        // TODO: we should also check the type of file
      }
  </script>
</head>

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


</html>
@endsection
