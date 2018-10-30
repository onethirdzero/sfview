<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-28
 * Time: 12:15 AM
 */

// DataBase Table:
/*
  CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
 */

class Users
{
    public $userID;
    public $username;
    public $password;
    public $email;
    public $admin;
    private $pdo;
    public function __construct($name, $pass, $admin = 0, $ID = -1, $mail = null)
    {
        $this->userID = $ID;
        $this->username = $name;
        $this->password = $pass;
        $this->email = $mail;
        $this->admin = $admin;
    }
    public function storeDB($pdo){
        $sql = "INSERT INTO users
                VALUES(:username, :password, :admin, :email)";
        $this->pdo = $pdo;
        if($this->searchUsername($this->username)){
            return false;
        }
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username", $this->username);
        $stmt->bindValue(":password", $this->password);
        $stmt->bindValue(":admin", $this->admin);
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    public function getFromDB(){
        return false;
    }
    public function searchUsername($name){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username", $name);
        $stmt->execute();
        $row = $stmt->fetch();
        if(!$row['id']){
            return false;
        }
        $this->userID = $row['id'];
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->password = $row['admin'];
        $this->email = $row['email'];
        return true;
    }
}