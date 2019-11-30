<?php
  include 'mysqlfunctions.php';
  session_start();

  $op = new MySqlFunctions();
  $userName = $_POST['si_email'];
  $passw = $_POST['si_password'];
  $result = $op->logIn($userName, $passw);
  if ($result){
    $_SESSION['user'] = $userName;
    header('Location:../home.php');
  }else{
    echo 'Something went wrong on login';
  }

 ?>
