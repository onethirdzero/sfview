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

<html>

 <head>
        <link rel="stylesheet" href="./css/app.css">
  </head>

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

<body>
    <div style="padding:30px">
    <h1>All locations in Database</h1>
    <table class="table">

          <th>
              <td><b>Location</b></td>
              <td><b>Acceptible Phrases</b></td>
          </th>

        <?php

          define("DBUSER", "sfview_user");
          define("DBPASS", "pass");
          $connString = "mysql:host=localhost;dbname=sfview";

          $user = DBUSER;
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
              echo '<tr>';
              echo '<td>';
              echo '<a href="/panorama/'.$next["filename"].'">'.$next["location"].'</a> <br>';
              echo '<td>';
                echo '<td>';
                echo $next["dirction"];
                echo '<td>';
              echo '</tr>';
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
    </table>

    </div>

<!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create
a panorama. we show this panorama to the user and ask them to add markers -->

<!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>

@endsection