<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php?redirect=reserve');
    exit;
}

$vehicle_number = $_POST['vehicle_number'];
$customer_name = $_POST['customer_name'];
$mobile_number = $_POST['mobile_number'];
$vehicle_type = $_POST['vehicle_type'];
$slot_number = $_POST['slot_number'];
$email_address = $_SESSION['user_email']; // Get email from session

$stmt = $pdo->prepare("INSERT INTO reservations (vehicle_number, customer_name, mobile_number, vehicle_type, slot_number, email_address) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt->execute([$vehicle_number, $customer_name, $mobile_number, $vehicle_type, $slot_number, $email_address])) {
    header('Location: cus-details.php');
    exit;
} else {
    echo "Booking failed. Please try again.";
}
?>

