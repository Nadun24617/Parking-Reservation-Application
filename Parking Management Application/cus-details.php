<?php
// Establishing a connection to the database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "parking reservation system"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM reservations WHERE email_address = ?");
$stmt->bind_param("s", $email);

// Execute statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if we have a match
if ($result->num_rows > 0) {
    // Fetch data
    $customer_data = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $customer_data = [];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <?php include("components/header.php")?>
    </header>
    <div class="container">
        <h1 class="mt-5">Customer Data</h1>
        <?php if (!empty($customer_data)): ?>
            <?php foreach ($customer_data as $customer): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Vehicle Number:</strong> <?php echo htmlspecialchars($customer['vehicle_number']); ?></p>
                        <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($customer['customer_name']); ?></p>
                        <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($customer['mobile_number']); ?></p>
                        <p><strong>Vehicle Type:</strong> <?php echo htmlspecialchars($customer['vehicle_type']); ?></p>
                        <p><strong>Slot Number:</strong> <?php echo htmlspecialchars($customer['slot_number']); ?></p>
                        <p><strong>Email Address:</strong> <?php echo htmlspecialchars($customer['email_address']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="alert alert-warning">No customer found with that email address.</p>
        <?php endif; ?>
    </div>
    <footer>
        <?php include("components/footer.php")?>
    </footer>
</body>
</html>