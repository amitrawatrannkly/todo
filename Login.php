<?php
include("Nab.php");
include("Action/config.php");
if (isset($_POST['submit'])) {
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = $conn->prepare("select * from users where username='$username' and password='$password'");
  $query->execute();
  $user = $query->fetch(PDO::FETCH_ASSOC);
  if ($user) {
    $_SESSION['id'] = $user['id'];
    header('Location: ./dashboard.php');
  } else {
    header('Location: ./Login.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <h2>Login Form :)</h2><br>

    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">UserName</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" name="submit" class="btn btn-danger">Signin</button>
    </form>
  </div>
</body>

</html>