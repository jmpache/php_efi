<?php

include "mysqlfunctions.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$passw = $_POST['password'];

$function = New MySqlFunctions();
$function -> signUp($firstName, $lastName, $passw, $email);
header('Location: ../home.php');

?>
