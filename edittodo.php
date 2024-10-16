<?php
include("Action/config.php");
$id = $_GET['id'];
$query = $conn->prepare("select * from todos where id = $id");
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>To-Do</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>Update Todo :)</h2>

        <form action="savetodo.php?id=<?php echo $data['id'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" name="tittle" value="<?php echo $data['tittle'] ?>" class="form-control" id="exampleInputPassword1">
                <!-- <span><?php echo $errors['lname'] ?? "" ?></span> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" value="<?php echo $data['description'] ?>" class="form-control" id="exampleInputPassword1">
                <!-- <span><?php echo $errors['username'] ?? "" ?></span> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Add Due Date (In Hours)</label>
                <input type="datetime-local" name="duedate" value="<?php echo $data['due_date'] ?>" class="form-control" id="exampleInputPassword1">
                <!-- <span><?php echo $errors['username'] ?? "" ?></span> -->
            </div>
            <button type="submit" name="submit" class="btn btn-danger">save</button>

        </form>
    </div>
</body>
</html>