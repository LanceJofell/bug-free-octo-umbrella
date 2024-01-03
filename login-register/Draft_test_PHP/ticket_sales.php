<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket Sale</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #e6f7ff;
        }
        .ticket-form {
            max-width: 600px;
            margin:0 auto;
            padding:50px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .ticket-form label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        .ticket-form input[type="text"],
        .ticket-form input[type="email"],
        .ticket-form input[type="tel"],
        /* For mobile number */
        .ticket-form select,
        .ticket-form input[type="number"],
        .ticket-form input[type="submit"] {
            width: 100%;
            
            padding: 8px;
            
            margin-bottom: 10px;
            box-sizing: border-box;
            
        }

        .ticket-form input[type="submit"] {
            padding: 8px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="ticket-form">
        <h2>Get Your Ticket</h2>

        <?php
        if (isset($_POST['users'])) {
            $name = htmlentities($_POST['users']);
            echo "<p>You've selected: $name</p>";
        } else {
            echo "<p>No event selected</p>";
        }
        ?>

        <form action="purchase.php" method="POST" id="ticketForm">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="fname"style="color:black ;" required> 

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter 11-digit number" required>

            <label for="ticket-type">Ticket Type:</label>
            <select id="ticket-type" name="ticket-type" onchange="calculatePrice()" required>
                
                <option value="" style="color:black ;">Select a ticket type</option>
                <option value="standard" data-price="150">Standard ($150)</option>
                <option value="premium" data-price="200">Premium ($200)</option>
                <option value="vip" data-price="350">VIP ($350)</option>
                
            </select>

            <label for="quantity"style="color:black ;">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" onchange="calculatePrice()" required>

            <label for="total-price">Total Price:</label>
            <input type="text" id="total-price" name="total-price" readonly>

            <input type="hidden" name="event" value="<?php echo $name; ?>" >

            <input type="submit" value="Purchase Ticket">

        </form>
    </div>

    <script>
        function calculatePrice() {
            const ticketTypeSelect = document.getElementById("ticket-type");
            const selectedOption = ticketTypeSelect.options[ticketTypeSelect.selectedIndex];
            const ticketPrice = parseFloat(selectedOption.dataset.price);
            const quantity = parseInt(document.getElementById("quantity").value);
            const totalPrice = ticketPrice * quantity;

            document.getElementById("total-price").value = totalPrice.toFixed(2);
        }
    </script>
</body>

</html>
