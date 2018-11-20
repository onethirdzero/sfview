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

    <script type='text/javascript'>
      function validateLogin() {
        var x = document.forms["loginFrom"]["email"].value;
        var y = document.forms["loginFrom"]["password"].value;
        if (x == "") {
            alert("Email must be filled out");
            return false;
        }
        if (y == "") {
            alert("Password must be filled out");
            return false;
        }
      }
      function validateSignup() {
        var x = document.forms["SignUpFrom"]["email"].value;
        var y = document.forms["SignUpFrom"]["password"].value;
        var y1 = document.forms["SignUpFrom"]["password_confirm"].value;
        if (x == "") {
            alert("Email must be filled out");
            return false;
        }
        if (y == "") {
            alert("Password must be filled out");
            return false;
        }
        if (y != y1) {
            alert("Password and Confirm Password are different!");
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
        echo '<p>Welcome! '.$name.' <a href="./userForm.php?log=logout"> Sign out</a> </P>';
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

<?php
  if ($user != 1){
?>
<div class="formDiv">
    <form action="./usersInfo/Login.php" name = "loginFrom" onsubmit="return validateLogin()" method="post">
        <fieldset>
            <legend>Log In Credentials</legend>
            <div class="form-group row">
                <label class="col-lg-3" for="email">Email</label>
                <input class="col-lg-9" type="text" name = "email" class="form-control" id="loginemail">
            </div>
            <div class="form-group row">
                <label class="col-lg-3" for="password">Password</label>
                <input class="col-lg-9" type="password" name = "password" class="form-control" id="loginpassword">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
</div>
<?php
}
?>

<div class="formDiv">
  <form action="./usersInfo/SignUp.php" name = "SignUpFrom" onsubmit="return validateSignup()" method="post">
      <fieldset>
          <legend>Registration</legend>
          <div class="form-group row">
              <label class="col-lg-3" for="exampleInputPassword1">Email</label>
              <input class="col-lg-9" type="text" class="form-control" name="email" id="email">
          </div>
          <div class="form-group row">
              <label class="col-lg-3" for="password">Password</label>
              <input class="col-lg-9" type="password" class="form-control" name="password" id="password">
          </div>
          <div class="form-group row">
              <label class="col-lg-3" for="password_confirm">Confirm Password</label>
              <input class="col-lg-9" type="password" class="form-control" name="password_confirm" id="password_confirm">
          </div>
          <fieldset class="form-group">
              <legend>User Type</legend>
              <div class="form-check">
                  <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="userType" id="user" value="option1" checked>
                      I'm just an ordinary user
                  </label>
              </div>
              <div class="form-check">
                  <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="userType" id="admin" value="option2">
                      Consider me for admin privileges. I want to review submitted photospheres and edit markers.
                  </label>
              </div>
          </fieldset>
          <fieldset class="form-group">
              <legend>Email Notifications</legend>
              <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      I want to receive emails about developments on this site
                  </label>
              </div>
          </fieldset>
          <button type="submit" class="btn btn-primary">Register</button>
      </fieldset>
  </form>
</div>
</body>
</html>
