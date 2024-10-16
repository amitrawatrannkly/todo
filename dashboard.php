<?php
session_start();
include("Nab.php");
include "Action/config.php";
if(!isset($_SESSION['id'])){
    header('Location:./Login.php');
    exit;  
}
$id = $_SESSION['id'];
$query = $conn->prepare("select * from users where id = '$id'");
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);
if(!$data){
    header('Location: ./Login.php');  
}
?>