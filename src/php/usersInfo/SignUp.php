<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-27
 * Time: 11:05 PM
 */


require_once 'Users.php';

try {
    $connString = "mysql:host=localhost;dbname=bookcrm";
    $user = DBUSER;
    $pass = DBPASS;
    $pdo = new PDO($connString,$user,$pass);
    if (isset($_POST['SignUP'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $New_User = new Users($username, $password);
        if ($New_User->searchUsername($username)){
            echo "<p> The Username already exists. </p>";
        }
        else if($New_User->storeDB($pdo)){
            echo "<p> Sign up Successfully! </p>";
        }else{
            echo "<p> Sign up failed. </p>";
        }
    }
}
catch (PDOException $e) {
    die( $e->getMessage() );
    echo "<p> Database error. </p>";
}


