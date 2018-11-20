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
  </script>
</head>

<!-- ?php include("php/nav-bar.php") ? -->


<body style="background-color: antiquewhite">


    <div class="formDiv">
      <form action="./panoramaInfo/panoramaUpload.php" method="POST" enctype="multipart/form-data">
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

    <!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create
    a panorama. we show this panorama to the user and ask them to add markers -->

    <!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>
@endsection
