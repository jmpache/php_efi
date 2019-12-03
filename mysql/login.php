<?php
  include 'mysqlfunctions.php';
  session_start();

  $op = new MySqlFunctions();
  $userName = $_POST['si_email'];
  $passw = $_POST['si_password'];
  $result = $op->logIn($userName, $passw);
  if ($result){
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['userId'] = $row['id'];
      $_SESSION['userName'] = $row['firstname'];
      $_SESSION['userEmail'] = $row['email'];
      $_SESSION['userAvatar'] = $row['avatar'];
      header('Location:../home.php');
    }
  } else {
    echo 'Something went wrong on login';
  }
 ?>
