<?php
require 'db.php';

// Get the smallest available slot number
$stmt = $pdo->prepare("SELECT MIN(slot_number + 1) AS next_slot FROM reservations WHERE slot_number + 1 NOT IN (SELECT slot_number FROM reservations)");
$stmt->execute();
$next_slot = $stmt->fetchColumn();

if ($next_slot === false) {
    $stmt = $pdo->prepare("SELECT MAX(slot_number) + 1 AS next_slot FROM reservations");
    $stmt->execute();
    $next_slot = $stmt->fetchColumn();
}

echo json_encode(['slot_number' => $next_slot]);
?>