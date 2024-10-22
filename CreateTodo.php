<?php
//session_start();
include("./Nab.php");
$id = $_SESSION['id'];
date_default_timezone_set('Asia/Kolkata');
include("Action/config.php");
if (isset($_POST['submit'])) {
  $tittle = $_POST['tittle'];
  $description = $_POST['description'];
  $currentDatetime = date("Y-m-d H:i:s");
  $created_at = $currentDatetime;
  $updated_at = $currentDatetime;
  $due_date = $_POST['due_date'];

  $due_date = $due_date ? $due_date : 12; // Default to 12 if $due_date is not set

  $currentDateTime = new DateTime(); // Create a new DateTime object for the current time
  $currentDateTime->add(new DateInterval("PT{$due_date}H")); // Add hours
  $dueDate = $currentDateTime->format("Y-m-d H:i:s"); 
  
   // Format the date as a string
    $query = $conn->prepare("
    insert into todos(tittle,userid,description,created_at,updated_at,due_date)
    values
    ('$tittle','$id','$description','$created_at','$updated_at','$dueDate')
    ");
  $query->execute();
  header('Location:./TodoList.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <h2>Create To-Do :)</h2>
    <form  method="post" >
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="tittle" class="form-control" id="title">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="description">
      </div>

      <div class="mb-3">
        <label for="duedate" class="form-label">Add Due Date (In Hours)</label>
        <input type="number" name="due_date" class="form-control" id="duedate">
      </div>

      <button type="submit" name="submit" class="btn btn-danger">Insert</button>
    </form>
  </div>
</body>
</html>