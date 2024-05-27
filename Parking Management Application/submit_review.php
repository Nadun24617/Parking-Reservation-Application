<?php
session_start();
require 'db.php'; // Include your PDO database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['rating'])) {
        $rating = $_POST['rating'];

        

        try {
            $stmt = $pdo->prepare("INSERT INTO reviews (rating) VALUES (:rating)");
            $stmt->execute(['rating' => $rating]);
            
        } catch (PDOException $e) {
            
        }
    } else {
        echo "Rating not received in POST data.";
    }
}
?>
<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            transition: font-size 0.5s ease; /* Transition for font size */
        }
        
        strong {
            font-size: 2em; /* Big font size */
        }
        
        p {
            margin-top: 20px; /* Add some space between elements */
        }
        
        i.fas.fa-heart {
            color: red;
            font-size: 4em; /* Larger heart icon */
            transition: font-size 0.5s ease; /* Transition for font size */
        }
    </style>
</head>
<body>
    <i class="fas fa-heart"></i>
    <strong>Thank You!</strong>
    <br>
    <p>We'll use your feedback to improve our Service</p>
</body>
