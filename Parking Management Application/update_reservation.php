<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php?redirect=view');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $vehicle_number = $_POST['vehicle_number'];
    $customer_name = $_POST['customer_name'];
    $mobile_number = $_POST['mobile_number'];
    $vehicle_type = $_POST['vehicle_type'];
    $slot_number = $_POST['slot_number'];
    $email_address = $_POST['email_address'];

    $stmt = $pdo->prepare("UPDATE reservations SET vehicle_number = ?, customer_name = ?, mobile_number = ?, vehicle_type = ?, slot_number = ?, email_address = ? WHERE id = ?");
    if ($stmt->execute([$vehicle_number, $customer_name, $mobile_number, $vehicle_type, $slot_number, $email_address, $id])) {
        header('Location: cus-details.php?success=1');
    } else {
        header('Location: cus-details.php?error=1');
    }
}
?>
