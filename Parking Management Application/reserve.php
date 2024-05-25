<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Parking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <main id="reservationForm" class="main"> 
        <h1>Parking Reservation Form</h1>
        <form action="submit_reservation.php" method="post">
            <div class="form-group">
                <label for="vehicle_number">Vehicle Number:</label>
                <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
            </div>
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" class="form-control" id="email_address" name="email_address" required>
            </div>
            <div class="form-group">
                <label for="vehicle_type">Vehicle Type:</label>
                <select class="form-control" id="vehicle_type" name="vehicle_type" required>
                    <option value="Car">Car</option>
                    <option value="Van">Van</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Tricycle">Tricycle</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Reservation</button>
        </form>
    </main>
    <footer>
        <?php include("components/footer.php")?>
    </footer>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const reservationForm = document.getElementById('reservationForm');
            reservationForm.classList.add('show');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Submit form via AJAX
            $('form').submit(function(e){
                e.preventDefault(); // Prevent form submission
                $.ajax({
                    url: 'submit_reservation.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            alert(response.message); // Display success message
                        } else {
                            alert(response.message); // Display error message
                        }
                    },
                    error: function(xhr, status, error){
                        alert('An error occurred while processing your request.'); // Display generic error message
                    }
                });
            });
        });
    </script>

</body>
</html>
