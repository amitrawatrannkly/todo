<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav" style="width: 100%;">
            <li class="nav-item">
            <?php if(isset($_SESSION['id'])){?>
                <a class="nav-link active" href="./dashboard.php">Home</a>
            <?php } else { ?>
                <a class="nav-link active" href="./Nab.php">Home</a>
            <?php } ?>


                </li>
            <?php if (!isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./Registration.php">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Login.php">Login</a>
                </li>
                <?php }?>
                <?php if(isset($_SESSION['id'])){?>
                

                <li class="nav-item">
                    <a class="nav-link" href="./CreateTodo.php">Create-ToDo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./TodoList.php">ToDo-List</a>
                </li>
                <li class="nav-item ms-auto">
                    <a class="nav-link" href="./Logout.php">Log-Out</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </nav>
    
    <?php
    if ($_SERVER['REQUEST_URI'] == "/Nab.php") {
    ?>
        <div class="container d-flex flex-column justify-content-center align-items-center"  style="height: 400px;">
        <h3>THis Is My Project</h3>
        <p>Description:) TODO List Project where we apply crud operation.</p>
        </div>
    <?php
    }
    ?>
</body>
</html>