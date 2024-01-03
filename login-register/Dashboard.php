<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
        body{
            
            background-color: #e6f7ff; /* Light blue background */

        }
    </style>
        

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Event Announcement</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="login.php" style="color:black; font-size: large;" >Logout</a>
                </li>

        
                <!-- Nav items -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Event List</h1>

        <?php
        // Array of event details
        $events = [
            [
                "name" => "Event Name 1",
                "description" => "Description of Event 1.",
                "date" => "January 11, 2024",
                "time" => "7:00 PM",
                "price" => "$20"
            ],
            [
                "name" => "Event Name 2",
                "description" => "Description of Event 2.",
                "date" => "February 15, 2024",
                "time" => "6:30 PM",
                "price" => "$25"
            ],
            // Add events 3 to 10 with their details
            [
                "name" => "Event Name 3",
                "description" => "Description of Event 3.",
                "date" => "March 20, 2024",
                "time" => "5:45 PM",
                "price" => "$15"
            ],
            [
                "name" => "Event Name 4",
                "description" => "Description of Event 4.",
                "date" => "April 10, 2024",
                "time" => "8:00 PM",
                "price" => "$30"
            ],
            [
                "name" => "Event Name 5",
                "description" => "Description of Event 5.",
                "date" => "May 5, 2024",
                "time" => "4:30 PM",
                "price" => "$18"
            ],
            [
                "name" => "Event Name 6",
                "description" => "Description of Event 6.",
                "date" => "June 12, 2024",
                "time" => "6:15 PM",
                "price" => "$22"
            ],
            [
                "name" => "Event Name 7",
                "description" => "Description of Event 7.",
                "date" => "July 20, 2024",
                "time" => "7:30 PM",
                "price" => "$25"
            ],
            [
                "name" => "Event Name 8",
                "description" => "Description of Event 8.",
                "date" => "August 5, 2024",
                "time" => "6:00 PM",
                "price" => "$28"
            ],
            [
                "name" => "Event Name 9",
                "description" => "Description of Event 9.",
                "date" => "September 18, 2024",
                "time" => "5:00 PM",
                "price" => "$23"
            ],
            [
                "name" => "Event Name 10",
                "description" => "Description of Event 10.",
                "date" => "October 10, 2024",
                "time" => "7:45 PM",
                "price" => "$35"
            ],
        ];

        foreach ($events as $event) {
            echo '
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">' . $event["name"] . '</h5>
                    <p class="card-text">' . $event["description"] . '</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date: ' . $event["date"] . '</li>
                        <li class="list-group-item">Time: ' . $event["time"] . '</li>
                        <li class="list-group-item">Ticket Price: ' . $event["price"] . '</li>
                    </ul>
                    <form method="POST" action="ticket_sales.php">

                        <input type="hidden" name="event" value="' . htmlspecialchars($event["name"]) . '">
                        <button type="submit" class="btn btn-primary mt-2">Purchase</button>
                    </form>
                </div>
            </div>';
        }
        ?>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD"></script>
</body>

</html>
