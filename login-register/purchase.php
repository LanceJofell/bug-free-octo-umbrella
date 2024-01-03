<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\login-register\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\login-register\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\login-register\PHPMailer\src\SMTP.php';
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = 'lancejofellvillamil@gmail.com'; // Replace with the recipient's email address
    $subject = "Ticket Purchase Details";

    

    
    $message = "";
    
    $message .= isset($_POST["fname"]) ? "Name: " . $_POST["fname"] . "\n" : "";
    $message .= isset($_POST["email"]) ? "Email: " . $_POST["email"] . "\n" : "";
    $message .= isset($_POST["phone"]) ? "Mobile Number: " . $_POST["phone"] . "\n" : "";
    $message .= isset($_POST["ticket-type"]) ? "Ticket Type: " . $_POST["ticket-type"] . "\n" : "";
    $message .= isset($_POST["quantity"]) ? "Quantity: " . $_POST["quantity"] . "\n" : "";
    $message .= isset($_POST["total-price"]) ? "Total Price: $" . $_POST["total-price"] . "\n" : "";
    $message .= isset($_POST["event"]) ? "Event Name: " . $_POST["event"] . "\n" : "";
    
    //$message .= "Event Name: " . $_POST["users"] . "\n";
    //$message .= "Name: " . $_POST["fname"] . "\n";
    //$message .= "Email: " . $_POST["email"] . "\n";
    //$message .= "Mobile Number: " . $_POST["mobile"] . "\n";
    //$message .= "Ticket Type: " . $_POST["ticket-type"] . "\n";
    //$message .= "Quantity: " . $_POST["quantity"] . "\n";
    //$message .= "Total Price: $" . $_POST["total-price"] . "\n";
    

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lancejofellvillamil@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'lbsl fxuu ylhp hnuu'; // Replace with your SMTP password
        $mail->SMTPSecure = 'ssl'; // Change to 'ssl' if necessary, or remove this line if not using encryption
        $mail->Port = 465; // Replace with your SMTP port

        $mail->setFrom('sender@example.com', 'Sender Name');
        $mail->addAddress($to);

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {

        echo 'Email sending failed. Error: ' . $mail->ErrorInfo;
    }
} else {
    echo "Invalid request!";
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Your Purchase</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Additional Custom Styles */
    body {
      background-color: #f8f9fa;
    }
    .thank-you {
      margin-top: 50px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>


<form action="dashboard.php" method="post">
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="thank-you">
        <h2 class="text-center mb-4">Thank You for Your Purchase!</h2>
        <p>Congratulations, your ticket purchase is confirmed! Thank you for choosing us.</p>
        <p>You will receive an email confirmation.</p>
        <hr>
        <p class="text-center">For any inquiries or support, contact us at <strong>support@example.com</strong></p>
       
        <div class="text-center">

            <input type="submit" value="Bact to Homepage" name="dashboard" class="btn btn-primary">
          
        </div>
      </div>
    </div>
  </div>
</div>

</form>


<!-- Bootstrap JS and dependencies (if needed) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
