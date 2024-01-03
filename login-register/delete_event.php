<?php
include_once 'database.php';

$id = $_GET['id'] ?? null;
$query = "DELETE FROM users WHERE id='$id'";
mysqli_query($conn, $query);

header('Location: index.php');
exit;
?>
