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

// Delete function
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM reservations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetching data from the database
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    table th {
        background-color: #f5f5f5;
        font-weight: bold;
        color: #333;
    }

    table td {
        color: #666;
    }

    table tr:hover {
        background-color: #f9f9f9;
    }

    .delete-btn {
        padding: 8px 15px;
        background-color: #e74c3c;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Parking Management System - Reservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle Number</th>
                <th>Customer Name</th>
                <th>Mobile Number</th>
                <th>Vehicle Type</th>
                <th>Slot Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through each row of data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['vehicle_number'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['mobile_number'] . "</td>";
                    echo "<td>" . $row['vehicle_type'] . "</td>";
                    echo "<td>" . $row['slot_number'] . "</td>";
                    echo "<td><button class='delete-btn' data-id='" . $row['id'] . "'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No reservations found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // JavaScript to handle delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            let id = this.getAttribute('data-id');
            if (confirm("Are you sure you want to delete this reservation?")) {
                window.location.href = 'admin-dashboard.php?action=delete&id=' + id;
            }
        });
    });
</script>

</body>
</html>

<?php
// Closing the database connection
$conn->close();
?>
