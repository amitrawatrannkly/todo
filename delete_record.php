<?php
include("Action/config.php");
$id = $_GET['id'];
$query = $conn->prepare("delete from todos where id = '$id'");
$query->execute();
header('Location:./TodoList.php');
exit;

?>