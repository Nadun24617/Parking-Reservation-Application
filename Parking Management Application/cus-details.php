<?php
session_start();
require 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            if ($stmt->execute([$email, $hashed_password])) {
                $success = "Registration successful. You can now log in.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } elseif (isset($_POST['login'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: cus-details.php');
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } elseif (isset($_POST['book_slot'])) {
        if (!isset($_SESSION['user_id'])) {
            $error = "You need to log in to book a slot.";
        } else {
            $vehicle_number = $_POST['vehicle_number'];
            $customer_name = $_POST['customer_name'];
            $mobile_number = $_POST['mobile_number'];
            $vehicle_type = $_POST['vehicle_type'];
            $slot_number = $_POST['slot_number'];
            $email_address = $_POST['email_address'];

            $stmt = $pdo->prepare("INSERT INTO reservations (vehicle_number, customer_name, mobile_number, vehicle_type, slot_number, email_address) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt->execute([$vehicle_number, $customer_name, $mobile_number, $vehicle_type, $slot_number, $email_address])) {
                $success = "Slot booked successfully.";
            } else {
                $error = "Booking failed. Please try again.";
            }
        }
    } elseif (isset($_POST['update_slot'])) {
        if (!isset($_SESSION['user_id'])) {
            $error = "You need to log in to update slot details.";
        } else {
            $id = $_POST['id'];
            $vehicle_number = $_POST['vehicle_number'];
            $customer_name = $_POST['customer_name'];
            $mobile_number = $_POST['mobile_number'];
            $vehicle_type = $_POST['vehicle_type'];
            $slot_number = $_POST['slot_number'];
            $email_address = $_POST['email_address'];

            $stmt = $pdo->prepare("UPDATE reservations SET vehicle_number = ?, customer_name = ?, mobile_number = ?, vehicle_type = ?, slot_number = ?, email_address = ? WHERE id = ?");
            if ($stmt->execute([$vehicle_number, $customer_name, $mobile_number, $vehicle_type, $slot_number, $email_address, $id])) {
                $success = "Slot details updated successfully.";
            } else {
                $error = "Update failed. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration/Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin-top: 100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <?php include("components/header.php")?>
    </header>
    <div class="container">
        <h1 class="text-center">Customer Registration/Login</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="cus-details.php" method="post">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form action="cus-details.php" method="post">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <form action="cus-details.php" method="post">
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
                    <input type="text" id="slot_number" name="slot_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email_address">Email Address:</label>
                    <input type="email" id="email_address" name="email_address" class="form-control" required>
                </div>
                <button type="submit" name="book_slot" class="btn btn-primary btn-block">Book Slot</button>
            </form>
        <?php endif; ?>
    </div>
    <footer>
        <?php include("components/footer.php")?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
