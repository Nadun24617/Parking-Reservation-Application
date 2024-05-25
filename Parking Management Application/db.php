<?php
$servername = "127.0.0.1"; // Use 127.0.0.1 instead of localhost for MySQL connection
$username = "root";
$password = "";
$dbname = "parking reservation system";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
