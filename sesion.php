<?php
if(!isset($_SESSION['id'])){
    header('Location:./Login.php');
    exit;  
}
