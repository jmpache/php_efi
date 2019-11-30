<?php

include "mysqlfunctions.php";

$id = $_GET['id'];

$function = New MySqlFunctions();
$function -> deletePost($id);
header('Location: ../home.php')

?>