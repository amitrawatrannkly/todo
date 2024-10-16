<?php
session_start();
include("Action/config.php");
$id = $_GET['id'];
$tittle = $_POST['tittle'];
$description = $_POST['description'];
$query = $conn->prepare("update `todos` set `tittle` = '$tittle', `description` = '$description', `updated_at` = CURRENT_TIMESTAMP() where `id` = '$id'");
$query->execute();
header('Location:./TodoList.php');
exit;
?> 