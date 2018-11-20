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

</head>

<!-- ?php include("php/nav-bar.php") ? -->
<!-- php isn't acting like I'd expect on our server so for the check-in I've just put this here. -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/index.php">SFView</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  session_start();
  $user = 0;
    if (isset($_SESSION["username"])){
      if (isset($_GET["log"])){
        if ($_GET["log"] == "logout"){
          $_SESSION = array();
          session_destroy();
        }
      }else{
        $user = 1;
        $name = $_SESSION["username"];
        echo '<p>Welcome! '.$name.' <a href="./panoramaList.php?log=logout"> Sign out</a> </P>';
      }
    }
  ?>
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
      <form action="./panoramaInfo/panoramaUpload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>All Panoramas</legend>
          <div class="form-group row">
            <?php
              $connString = "mysql:host=localhost;dbname=sfview";
              $user = DBNAME;
              $pass = DBPASS;
              $pdo = new PDO($connString,$user,$pass);

              $sql = "SELECT * FROM locations";
              $stmt = $pdo->prepare($sql);
              $stmt->execute();
              $number_of_rows = $stmt->rowCount();
              if ($number_of_rows == 0){
                $pages = 0;
              }else{
                $pages = ($number_of_rows - 1) / 10 + 1;
                $pages = (int)$pages;
                if (isset($_GET["page"])){
                  $page  = $_GET["page"];
                } else {
                  $page=1;
                };
                $start_from = ($page-1) * 10;
                $sql = "SELECT * FROM locations LIMIT $start_from, 10";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                while ($next = $stmt->fetch())
                {
                  $current = $next;
                  echo '<a href="./panoramaInfo/panoramaSearch.php?location='.$next["location"].'">'.$next["location"].'</a> <br>';
                }
                echo "<br>";
                echo "<a href='./panoramaList.php?page=1'>".'|<'."</a> "; // first page
                for ($i=1; $i<=$pages; $i++) {
                  echo "<a href='./panoramaList.php?page=".$i."'>".$i."</a> ";
                };
                echo "<a href='./panoramaList.php?page=$pages'>".'>|'."</a> "; // last page
              }

              //test:

             ?>
          </div>
        </fieldset>
      </div>

    <!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create
    a panorama. we show this panorama to the user and ask them to add markers -->

    <!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>
