<?php
session_start();

// Logout functionality
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

include_once 'database.php';

// Retrieve events from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event List Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: whitesmoke;
        }
        
        .table {
            background-color: #e6f7ff; /* Event list background */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <form class="form-inline ml-auto" method="post">
            <input type="submit" class="btn btn-danger" name="logout" value="Logout">
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h2>Event List</h2>
    <a href="add_event.php" class="btn btn-primary mb-2">Add Event</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['description']; ?></td>
                    <td><?php echo $user['date']; ?></td>
                    <td><?php echo $user['time']; ?></td>
                    <td><?php echo $user['venue']; ?></td>
                    <td>
                        <a href="edit_event.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="delete_event.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
