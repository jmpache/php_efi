<?php

include "mysqlfunctions.php";
session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$passw = $_POST['password'];
$avatar = 'https://api.adorable.io/avatars/50/'.$firstName.'.png';

$REGISTER_MESSAGE = 'Hi! <b>'.$firstName.'</b>, welcome to Bloggie!</br>
                    Here are your credentials: </br> User: '.$email.'</br>'.
                    ' Password: '.$passw.'</br>'.'Have fun!';

$REGISTER_SUBJECT = 'Welcome to Bloggie!'; //TODO: put this into a consts file.

$function = New MySqlFunctions();
$function -> signUp($firstName, $lastName, $passw, $email, $avatar);
$result = $function->logIn($email, $passw);
if ($result){
  while($row = mysqli_fetch_assoc($result)){
    $_SESSION['userId'] = $row['id'];
    $_SESSION['userName'] = $row['firstname'];
    $_SESSION['userEmail'] = $row['email'];
    $_SESSION['userAvatar'] = $row['avatar'];
    $function -> sendEmail($REGISTER_SUBJECT, $REGISTER_MESSAGE, $email);
    header('Location:../home.php');
  }
} else {
  echo 'Something went wrong on login';
}
?>
