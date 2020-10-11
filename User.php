<?php

class User{
  static function addUser(){
    $mysqli = mysqli_connect("localhost", "kuzya19l_0994", "2*GlX29B", "kuzya19l_0994");
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email =  mb_strtolower(trim($_POST['email']));
    $pass = $pass = trim($_POST ['pass']);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    if ($result->num_rows){
      echo "exist";
    }else{
      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
      echo "success";
    }
  }
  static function authUser(){
    $mysqli = new mysqli("localhost", "kuzya19l_0994", "2*GlX29B", "kuzya19l_0994");
    $email =  mb_strtolower(trim($_POST['email']));
    $pass = trim($_POST ['pass']);
    $result = $mysqli->query("SELECT * FROM `users`WHERE `email`='$email'");
    $row = $result->fetch_assoc();
    if (password_verify($pass,$row['pass'])){
      $_SESSION["name"] = $row["name"];
      $_SESSION["lastname"] = $row["lastname"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["id"] = $row["id"];
      echo "success";
    }else{
      echo "error";
    }
  }
  static function changeUserData(){
    /*Меняет данные пользователя (аралог lk_obr.php)*/
    $mysqli = new mysqli("localhost", "kuzya19l_0994", "2*GlX29B", "kuzya19l_0994");
    $value = $_POST['value'];
    $item = $_POST['item'];
    $userId = $_SESSION['id'];
    $mysqli->query("UPDATE `users` SET `$item`='$value' WHERE `id`='$userId'");
    $_SESSION[$item] = $value;
  }
  static function getUsers(){
    /*Пойду в БД и достану список*/
  }
  static function getUser($userId){
    /*Пойду в БД и достану пользователя по ID*/
  }
}
?>
