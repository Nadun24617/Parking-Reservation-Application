<?php
// db.php
$host = 'localhost';
$db = 'parking_reservation';
$user = 'root'; // Use your database username
$pass = ''; // Use your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
