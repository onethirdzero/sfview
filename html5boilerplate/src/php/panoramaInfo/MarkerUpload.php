<!-- for checks: make sure file is an image, and that it is the correct size (?)

logic: upload image into db. user should then be redirected to markerForm.php

-->

<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-30
 * Time: 12:06 AM
 */
require_once '../usersInfo/Users.php';
session_start();

if (isset($_POST['tooltipStr'])){
  $connString = "mysql:host=localhost;dbname=sfview";
  $user = DBNAME;
  $pass = DBPASS;
  $pdo = new PDO($connString,$user,$pass);
  $long = $_POST['long'];
  $lat = $_POST['lat'];
  $name = $_POST['tooltipStr'];
  $info = $_POST['info'];
  $sql = "INSERT INTO marker(name, longitude, latitude, info)
          VALUES(:name, :longitude, :latitude, :info)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":name", $name);
  $stmt->bindValue(":longitude", $long);
  $stmt->bindValue(":latitude", $lat);
  $stmt->bindValue(":info", $info);
  $stmt->execute();
  if($stmt){
      return true;
  }else{
      return false;
  }
  echo '<a href="../markerForm.php">Return</a>';
}
 //}
