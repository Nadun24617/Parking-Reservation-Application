<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Your Parking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            color: #3c3a47;
            background-color: #f9f9f9;
        }
        main {
            max-width: 600px;
            margin: 80px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
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
            color: #007bff;
            margin-bottom: 20px;
        }
        form label {
            font-weight: bold;
            color: #007bff;
        }
        form input[type="text"],
        form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }
        form input[type="text"]:focus,
        form select:focus {
            outline: none;
            border-color: #007bff;
        }
        form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .form-group {
            position: relative;
        }
        .form-group input[type="text"]::placeholder {
            color: transparent;
        }
        .form-group input[type="text"]:focus + label,
        .form-group input[type="text"]:not(:placeholder-shown) + label {
            top: -12px;
            font-size: 0.8rem;
            color: #007bff;
        }
        label {
            position: absolute;
            top: 10px;
            left: 12px;
            transition: all 0.3s ease;
            pointer-events: none;
            background: #fff;
            padding: 0 5px;
        }
        @media (max-width: 768px) {
            html {
                font-size: 16px;
            }
        }
        @media (max-width: 576px) {
            html {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <?php include("components/navbar.php")?>
    </header>
    <main class="container">
        <h1>Reserve Your Parking Slot</h1>
        <form action="submit_reservation.php" method="post">
            <div class="form-group">
                <input type="text" id="vehicle_number" name="vehicle_number" class="form-control" placeholder=" " required>
                <label for="vehicle_number">Vehicle Number</label>
            </div>
            <div class="form-group">
                <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder=" " required>
                <label for="customer_name">Customer Name</label>
            </div>
            <div class="form-group">
                <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder=" " required>
                <label for="mobile_number">Mobile Number</label>
            </div>
            <div class="form-group">
                <input type="text" id="vehicle_type" name="vehicle_type" class="form-control" placeholder=" " required>
                <label for="vehicle_type">Vehicle Type</label>
            </div>
            <input type="hidden" id="slot_number" name="slot_number">
            <button type="submit" name="book_slot" class="btn btn-primary btn-block">Book Slot</button>
        </form>
    </main>
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
            document.querySelector('main').classList.add('show');
        });
    </script>
</body>
</html>
