<?php
session_start();
include("Mail.php");
$id = $_SESSION['id'];
include("./Nab.php");
include("./sesion.php");
include("Action/config.php");
$query = $conn->prepare("select * from todos where due_date < now()");
$query->execute();
$datas = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($datas as $i=>$data){
        try {
            // sendMail($data['due_date']); 
            $id = $data['id'];   
            $currentDateTime = new DateTime();

            // Check if the current date and time is greater than or equal to the due date
            // if ($currentDateTime >= $dueDateTime) {
                sendMail("vikasverma@rannkly.com","vikash verma","mail","hii vikash verma");
                $query = $conn->prepare("update todos set remainder_at = now() where id = '$id'");
                $query->execute();
            // }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
        ?>