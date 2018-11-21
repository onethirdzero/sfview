<!-- for checks: make sure file is an image, and that it is the correct size (?)

logic: upload image into db. user should then be redirected to markerForm.php

-->


<!doctype html>
<html class="no-js" lang="en" style="width: 100%; height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SFView</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="/site.webmanifest">
    <link rel="apple-touch-icon" href="/icon.png">
    <link rel="icon" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">

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
    if (isset($_SESSION["username"])){
      $user = 1;
      $name = $_SESSION["username"];
      echo "<p>Welcome! ".$name."</P>";
    }
  ?>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="../panoramaList.php">All Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../searchPanorama.php">Search</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../panoramaForm.php">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Help</a>
    </li>
  </ul>
  <button class="btn btn-secondary my-2 mr-lg-0" onclick="location.href='../userForm.php'" type="submit">Log In</button>
</nav>

<body style="background-color: antiquewhite">



  <?php
  /**
   * Created by PhpStorm.
   * User: Gavin
   * Date: 2018-10-30
   * Time: 12:06 AM
   */
   require_once '../usersInfo/Users.php';
        if (isset($_GET['location'])){
                 $connString = "mysql:host=localhost;dbname=sfview";
                 $user = DBNAME;
                 $pass = DBPASS;
                 $pdo = new PDO($connString,$user,$pass);

                 $sql = "SELECT * FROM locations WHERE location = :location";
                 $stmt = $pdo->prepare($sql);
                 $stmt->bindValue(":location", $_GET['location']);
                 $stmt->execute();
                 $row = $stmt->fetch();
                 if(!$row['id']){
                     echo "This location's name does not exist";
                 }else{
                   $fileData = $row['filename'];
                   // The next line will show the panoramas
                   echo '<img src="/panoramas/'.$fileData.'" />';
                if (isset($_SESSION["username"])){
                  $username = $_SESSION["username"];
                  $New_User = new Users($username, "000");
                  $New_User->searchUsername($username, $pdo);
                  if ($New_User->admin == 1){
                    echo '<form action="./panoramaDelete.php" method="POST" enctype="multipart/form-data">
                            <input id = "delete" class="delete" type="hidden" name="delete" value='.$row['location'].'>
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>';
                  }
                }

                 }
            }else {
                 echo "Please input the name of the location!";
               }
   //}
?>

</div>
</body>
</html>
