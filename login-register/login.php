<?php
##session_start();
#if (isset($_SESSION["user"])) {
   #header("Location: .php");
#}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <style>
        body{
            padding:50px;
            background-color: #e6f7ff; /* Light blue background */
            color: #333;

        }
        .container{
            max-width: 600px;
            margin:0 auto;
            padding:50px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

        }
        .form-group{
            margin-bottom:30px;
        }
        .register-link {
            text-align: right; /* Align the text to the center */
            margin-top: 20px; /* Add some space between the form and the link */
            color: #555; /* Adjust text color if needed */
            font-size: 14px;
        
    }
        

    </style>
    
</head>
<body>  
    <div class="container" >
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: Client_dashboard.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <h2> Event Announcement</h2>
        <p>Ticket Purchasing</p>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div class="register-link">
     <p>Not registered yet <a href="registration.php">Register Here</a></p>
     <p style="position: absolute; bottom: 10px; left: 10px;">Login as an<a href="admin_login.php">Admin</a></p>
     
     </div>
    </div>
    

</body>
</html>