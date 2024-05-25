<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login_register.php?redirect=view');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
    if ($stmt->execute([$id])) {
        header('Location: cus-details.php?success=1');
    } else {
        header('Location: cus-details.php?error=1');
    }
}
?>
