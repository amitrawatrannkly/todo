<?php
include("./Nab.php");

$errors = [];
if (isset($_POST['submit'])) {
  include("Action/config.php");
  $fname = $_POST['fname'];
  if (empty($fname)) {
    $errors['firstname'] = "please enter your name";
  }
  $lname = $_POST['lname'];
  if (empty($lname)) {
    $errors['lastname'] = "please enter your lastname";
  }
  $username = $_POST['username'];
  if (empty($username)) {
    $errors['username'] = "please enter your username";
  }
  $email = $_POST['email'];
  if (empty($email)) {
    $errors['email'] = "please enter your email";
  }
  $password = $_POST['password'];
  if (empty($password)) {
    $errors['password'] = "please enter your password";
  }
  if (count($errors) == 0) {
    $query = $conn->prepare("
   insert into `users`(name,lastname,username,email,password)
   values
   ('$fname','$lname','$username','$email','$password')
   ");
    $query->execute();
    header('Location: ./Login.php');
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <h2>Registration Form :)</h2><br>

    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">FirstName</label>
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <span><?php echo $errors['firstname'] ?? "" ?></span>

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">LastName</label>
        <input type="text" name="lname" class="form-control" id="exampleInputPassword1">
        <span><?php echo $errors['lname'] ?? "" ?></span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">UserName</label>
        <input type="text" name="username" class="form-control" id="exampleInputPassword1">
        <span><?php echo $errors['username'] ?? "" ?></span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputPassword1">
        <span><?php echo $errors['email'] ?? "" ?></span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <span><?php echo $errors['password'] ?? "" ?></span>
      </div>
      <button type="submit" name="submit" class="btn btn-danger">SignUp</button>
    </form>
  </div>
</body>

</html>