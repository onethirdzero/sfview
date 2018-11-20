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
</head>

<!-- ?php include("php/nav-bar.php") ? -->
<!-- php isn't acting like I'd expect on our server so for the check-in I've just put this here. -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/index.php">SFView</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="./panoramaList.php">All Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./searchPanorama.php">Search</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./panoramaForm.php">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Help</a>
    </li>
  </ul>
  <button class="btn btn-secondary my-2 mr-lg-0" onclick="location.href='./userForm.php'" type="submit">Log In</button>
</nav>

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

    <!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create
    a panorama. we show this panorama to the user and ask them to add markers -->

    <!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>
