<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];

    $query = "UPDATE users SET name='$name', description='$description', date='$date', time='$time', venue='$venue' WHERE id='$id'";
    mysqli_query($conn, $query);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'] ?? null;
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Edit Event</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $users['name']; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?php echo $users['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $users['date']; ?>">
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" value="<?php echo $users['time']; ?>">
        </div>
        <div class="form-group">
            <label for="venue">Venue:</label>
            <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $users['venue']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
