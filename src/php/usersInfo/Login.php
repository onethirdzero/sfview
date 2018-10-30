<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-29
 * Time: 12:00 AM
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
        if (!$New_User->searchUsername($username)){
            echo "<p> The user does not exist. </p>";
        }
        else if($password != $New_User->password){
            echo "<p> Password is not correct! </p>";
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
        }
    }
}
catch (PDOException $e) {
    die( $e->getMessage() );
    echo "<p> Database error. </p>";
}