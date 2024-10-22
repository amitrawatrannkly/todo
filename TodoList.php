<?php
//session_start();
include("./Nab.php");
$id = $_SESSION['id'];
include("./sesion.php");
include("Action/config.php");
$query = $conn->prepare("select * from todos where userid='$id'");
$query->execute();
$datas = $query->fetchAll(PDO::FETCH_ASSOC);

// function sendMail($dueDateTime){
// $currentDateTime = new DateTime();

// // Check if the current date and time is greater than or equal to the due date
// if ($currentDateTime >= $dueDateTime) {
//     // Prepare email details
//     $to = 'recipient@example.com';
//     $subject = 'Reminder: Task Due';
//     $message = 'This is a reminder that your task is due as of ' . $dueDateTime->format('l, F j, Y g:i A') . '.';
//     $headers = 'From: sender@example.com' . "\r\n" .
//                'Reply-To: sender@example.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();

//     // Send the email
//     if (mail($to, $subject, $message, $headers)) {
//         echo 'Reminder email sent successfully.';
//     } else {
//         echo 'Failed to send reminder email.';
//     }
// } else {
//     echo 'The due date has not yet arrived.';
// }}
?>
 
 <div class="container mt-3">
  <h2>ToDo List</h2>
  
  <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tittle</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>   
    </thead>
    <tbody>
    <?php
    foreach($datas as $i=>$data){
        
        // try {
        //     sendMail($data['due_date']);    
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
      
        ?>
    <tr>
        <td><?php echo $i+1?></td>
        <td><?php echo $data['tittle']?></td>
        <td><?php echo $data['description']?></td>
        <td><?php echo $data['due_date'];?></td>
        <td>
            <a href="edittodo.php?id=<?php echo $data['id']?>">Edit</a>
            <a href="delete_record.php?id=<?php echo $data['id']?>">Delete</a>
        </td>
    </tr>

    <?php }?>

     </tbody>
  </table>
</div>