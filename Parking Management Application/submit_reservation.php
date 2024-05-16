<?php
session_start(); // Start the session


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "parking reservation system"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_number = $_POST["vehicle_number"];
    $customer_name = $_POST["customer_name"];
    $mobile_number = $_POST["mobile_number"];
    $vehicle_type = $_POST["vehicle_type"];

    // Calculate parking slot number
    $sql = "SELECT COUNT(*) AS total_reservations FROM reservations";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_reservations = $row["total_reservations"];
        $parking_slot = ($total_reservations % 100) + 1; // Assuming 100 parking spaces numbered 1 to 100

        // Save the reservation to the database
        $sql = "INSERT INTO reservations (vehicle_number, customer_name, mobile_number, vehicle_type, slot_number) 
                VALUES ('$vehicle_number', '$customer_name', '$mobile_number', '$vehicle_type', '$parking_slot')";

        if ($conn->query($sql) === TRUE) {
            // Set response data
            $response["success"] = true;
            $response["message"] = "Your parking slot is successfully reserved. Your parking slot number is: $parking_slot";
        } else {
            $response["success"] = false;
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Error retrieving total reservations.";
    }
}

$conn->close();

// Send JSON response
echo json_encode($response);
?>