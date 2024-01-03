<?php
session_start();

function adminLogin($username, $password) {
    $adminUsername = "admin";
    $adminPassword = "password123";

    if ($username === $adminUsername && $password === $adminPassword) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    if (adminLogin($inputUsername, $inputPassword)) {
        $_SESSION["loggedin"] = true;
        header("Location: index.php");
        exit;
    } else {
        $loginError = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        /* Add any custom styles here */
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>

    <div class="container login-container">
        <h2 class="text-center mb-4">Admin Login</h2>
        <?php if(isset($loginError)) { echo "<div class='alert alert-danger'>$loginError</div>"; } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            
        </form>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
