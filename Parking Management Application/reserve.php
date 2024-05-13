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
        }

        main {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        main:hover {
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #FCC419; /* Yellow color */
        }

        form label {
            font-weight: bold;
            color: #000; /* Black color */
        }

        form input[type="text"],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        form input[type="text"]:focus,
        form select:focus {
            outline: none;
            border-color: #FCC419; /* Yellow color */
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FCC419; /* Yellow color */
            color: #000; /* Black color */
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
    <main>
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
</body>
</html>
