<?php
session_start();
include("Action/config.php");
$id = $_GET['id'];
$tittle = $_POST['tittle'];
$description = $_POST['description'];
$duedate = $_POST['duedate'];
$query = $conn->prepare("update `todos` set `tittle` = '$tittle', `description` = '$description', `due_date` = '$duedate', `updated_at` = CURRENT_TIMESTAMP() where `id` = '$id'");
$query->execute();
header('Location:./TodoList.php');
exit;
?> 