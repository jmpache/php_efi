<?php

include "mysqlfunctions.php";

$id = $_GET['id'];
var_dump($id);
$title = $_POST['title'];
$username = $_POST['username'];
$description = $_POST['description'];

$function = New MySqlFunctions();
$function -> updatePost($title, $description, $username, $id);
header('Location: ../home.php')

?>