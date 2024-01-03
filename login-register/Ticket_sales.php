<!DOCTYPE html>
<html>
<head>
    <title>Ticket Sale</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #e6f7ff;
        }
        .result-container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<?php
// Retrieve the event name from the query parameter
$selectedEvent = isset($_GET['event_name']) ? $_GET['event_name'] : '';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h2 class="mb-4">You've selected: <?php echo htmlspecialchars($selectedEvent); ?></h2>
            <form method="post" action="purchase.php"> <!-- Updated action attribute -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="fname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="ticket-type">Ticket Type:</label>
                    <select id="ticket-type" name="ticket-type" onchange="calculatePrice()" required>
                        <option value="" style="color:black;">Select a ticket type</option>
                        <option value="standard" data-price="150">Standard ($150)</option>
                        <option value="premium" data-price="200">Premium ($200)</option>
                        <option value="vip" data-price="350">VIP ($350)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity" style="color:black;">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" onchange="calculatePrice()" required>
                </div>
                <div class="form-group">
                    <label for="total-price">Total Price:</label>
                    <input type="text" id="total-price" name="total-price" readonly>
                </div>
                <input type="hidden" name="event" value="<?php echo htmlspecialchars($selectedEvent); ?>">
                <input type="submit" value="Purchase Ticket"  class="btn btn-primary">
            </form>
        </div>
    </div>
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
