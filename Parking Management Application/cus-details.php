<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php?redirect=view');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM reservations WHERE email_address = (SELECT email FROM users WHERE id = ?)");
$stmt->execute([$user_id]);
$reservations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
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
        <h1 class="text-center">Customer Details</h1>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Slot booked successfully.</div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">Booking failed. Please try again.</div>
        <?php endif; ?>
        <?php if (empty($reservations)): ?>
            <p class="alert alert-warning">No reservations found.</p>
        <?php else: ?>
            <?php foreach ($reservations as $reservation): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="update_reservation.php" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                            <div class="form-group">
                                <label for="vehicle_number_<?php echo $reservation['id']; ?>">Vehicle Number:</label>
                                <input type="text" id="vehicle_number_<?php echo $reservation['id']; ?>" name="vehicle_number" class="form-control" value="<?php echo htmlspecialchars($reservation['vehicle_number']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="customer_name_<?php echo $reservation['id']; ?>">Customer Name:</label>
                                <input type="text" id="customer_name_<?php echo $reservation['id']; ?>" name="customer_name" class="form-control" value="<?php echo htmlspecialchars($reservation['customer_name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile_number_<?php echo $reservation['id']; ?>">Mobile Number:</label>
                                <input type="text" id="mobile_number_<?php echo $reservation['id']; ?>" name="mobile_number" class="form-control" value="<?php echo htmlspecialchars($reservation['mobile_number']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_type_<?php echo $reservation['id']; ?>">Vehicle Type:</label>
                                <input type="text" id="vehicle_type_<?php echo $reservation['id']; ?>" name="vehicle_type" class="form-control" value="<?php echo htmlspecialchars($reservation['vehicle_type']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="slot_number_<?php echo $reservation['id']; ?>">Slot Number:</label>
                                <input type="text" id="slot_number_<?php echo $reservation['id']; ?>" name="slot_number" class="form-control" value="<?php echo htmlspecialchars($reservation['slot_number']); ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="email_address_<?php echo $reservation['id']; ?>">Email Address:</label>
                                <input type="email" id="email_address_<?php echo $reservation['id']; ?>" name="email_address" class="form-control" value="<?php echo htmlspecialchars($reservation['email_address']); ?>" required>
                            </div>
                            <button type="submit" name="update_slot" class="btn btn-primary btn-block">Update Slot</button>
                            <a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-block mt-2">Delete Slot</a>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <footer>
        <?php include("components/footer.php")?>
    </footer>
</body>
</html>
