<!DOCTYPE html>
<html>
<head>
    <title>Add Panorama</title>
    <!-- use bootswatch-->
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/vendor/bootstrap.css">
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
      <a class="nav-link" href="#">All Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/php/panoramaForm.php">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Help</a>
    </li>
  </ul>
  <button class="btn btn-secondary my-2 mr-lg-0" onclick="location.href='/php/userForm.php'" type="submit">Log In</button>
</nav>

<body>
    <form id="add-panorama" action="panoramaUpload.php" method="POST" enctype="multipart/form-data">
        Location Name: <input type="text" name="locationName">
        <br>
        Panorama: <input type="file" name="pan" id="pan">  
        <br>
        <input type="submit" value="Submit" id="submit-button">
    </form>

    <!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create 
    a panorama. we show this panorama to the user and ask them to add markers -->

    <!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>