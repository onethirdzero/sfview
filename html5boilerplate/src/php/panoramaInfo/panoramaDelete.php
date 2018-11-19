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
      if (isset($_POST['delete'])){
               $connString = "mysql:host=localhost;dbname=sfview";
               $user = DBNAME;
               $pass = DBPASS;
               $pdo = new PDO($connString,$user,$pass);

               if (isset($_SESSION["username"])){
                 $New_User = new Users($_SESSION["username"], 000);
                 $New_User->searchUsername($_SESSION["username"], $pdo);
                 if ($New_User->admin != 1){
                   echo 'Illegal Operation.';
                 }else {
                   $sql = "SELECT * FROM locations WHERE location = :location";
                   $stmt = $pdo->prepare($sql);
                   $stmt->bindValue(":location", $_POST['delete']);
                   $stmt->execute();
                   $row = $stmt->fetch();
                   $fileData = $row['dirction'];
                   if (!unlink($fileData))
                   {
                     echo ("Error deleting $file");
                   }
                   else
                   {
                     $location = $_POST['delete'];
                     $sql = "DELETE FROM locations WHERE location = :location";
                     $stmt = $pdo->prepare($sql);
                     $stmt->bindValue(":location", $location);
                     $stmt->execute();

                     $sql = "DELETE FROM marker WHERE location = :location";
                     $stmt = $pdo->prepare($sql);
                     $stmt->bindValue(":location", $location);
                     $stmt->execute();
                     echo '<p> delete Successfully </p>';
                     echo '<a href="../searchPanorama.php">Return</a>';
                   }
                 }
               }else {
                 echo 'Illegal Operation.';
               }
          }else {
               echo 'Illegal Operation.';
             }
 //}
