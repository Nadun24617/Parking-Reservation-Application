<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php?redirect=reserve');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Your Parking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
<style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            font-size: 18px;
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: rgb(60, 58, 71);
            background-color: #f9f9f9; 
            background-image: url('images/reserve-background.jpg');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center;
        }

        main {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            opacity: 0; 
            transform: translateY(50px); 
            transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out; 
        }

        main.show {
            opacity: 1; 
            transform: translateY(0); 
        }

        h1 {
            text-align: center;
            color: #FCC419; 
        }

        form label {
            font-weight: bold;
            color: #000; 
        }

        form input[type="text"],
        form input[type="email"], /* Add this line */
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        form input[type="text"]:focus,
        form input[type="email"]:focus, /* Add this line */
        form select:focus {
            outline: none;
            border-color: #FCC419; 
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FCC419; 
            color: #000; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        form input[type="submit"]:hover {
            background-color: #ffa500; 
        }
        
    </style>
</head>
<body>
    <header>
        <?php include("components/header.php")?>
    </header>
    <div class="container">
        <h1 class="text-center">Reserve Your Parking Slot</h1>
        <form action="submit_reservation.php" method="post">
            <div class="form-group">
                <label for="vehicle_number">Vehicle Number:</label>
                <input type="text" id="vehicle_number" name="vehicle_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" id="mobile_number" name="mobile_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="vehicle_type">Vehicle Type:</label>
                <input type="text" id="vehicle_type" name="vehicle_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slot_number">Slot Number:</label>
                <input type="text" id="slot_number" name="slot_number" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" id="email_address" name="email_address" class="form-control" required>
            </div>
            <button type="submit" name="book_slot" class="btn btn-primary btn-block">Book Slot</button>
        </form>
    </div>
    <footer>
        <?php include("components/footer.php")?>
    </footer>

    <script>
        // Auto-generate slot number and populate it in the form
        document.addEventListener("DOMContentLoaded", function() {
            fetch('generate_slot_number.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('slot_number').value = data.slot_number;
                });
        });
    </script>
</body>
</html>
