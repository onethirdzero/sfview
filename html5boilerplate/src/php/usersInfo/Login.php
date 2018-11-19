<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-29
 * Time: 12:00 AM
 */

require_once 'Users.php';
session_start();

try {
    $connString = "mysql:host=localhost;dbname=sfview";
    $user = DBNAME;
    $pass = DBPASS;
    $pdo = new PDO($connString,$user,$pass);
    //if (isset($_POST['SignUP'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $New_User = new Users($username, $password);
        if (!$New_User->searchUsername($username, $pdo)){
            echo "<p> The user does not exist. </p>";
            echo '<a href="../userForm.php">Return</a>';
        }
        else if($password != $New_User->password){
            echo "<p> Password is not correct! </p>";
            echo '<a href="../userForm.php">Return</a>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            echo "<p> Logged in! </p> ";
            echo '<a href="../userForm.php">Return</a>';
        }
    //}
}
catch (PDOException $e) {
    die( $e->getMessage() );
    echo "<p> Database error. </p>";
    echo '<a href="../userForm.php">Return</a>';
}
