<?php

include "mysqlfunctions.php";

$userId = $_GET['userId'];
$title = $_POST['title'];
$categoryId = $_POST['category'];
$description = $_POST['description'];
// $target_file = basename($_FILES['image']['name']); TODO: Add image upload to post form.

$function = New MySqlFunctions();
$function -> insertPost($title, $description, $userId, $categoryId);
header('Location: ../home.php')

?>