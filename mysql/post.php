<?php

include "mysqlfunctions.php";

$title = $_POST['title'];
$username = $_POST['username'];
$description = $_POST['description'];

$function = New MySqlFunctions();
$function -> insertPost($title, $description, $username);
header('Location: ../home.php')

?>