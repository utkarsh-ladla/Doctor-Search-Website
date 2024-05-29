<?php
// ... your PHP code to fetch doctors from the database ...
// ... your PHP code to fetch doctors from the database ...
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "doctor search"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user input to prevent SQL injection (sanitize for security)
$specialty = mysqli_real_escape_string($conn, $_POST['specialty']);
$location = mysqli_real_escape_string($conn, $_POST['location']);

// Build the query dynamically based on form input
$sql = "SELECT * FROM doctors WHERE 1 "; // Initial condition to always select rows

if (!empty($specialty)) {
    $sql .= " AND specialty = '$specialty' ";
}

if (!empty($location)) {
    $sql .= " AND location = '$location' ";
}

// Execute the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f8;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        font-size: 2.5rem;
        color: #333;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
    }

    .doctor-card {
        background-color: #ffffff;
        border: 1px solid #d1e0ff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 15px;
        overflow: hidden;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
        width: 300px;
        
    }

    .doctor-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .doctor-card img {
        border-radius: 50%;
        height: 150px;
        margin-top: 20px;
        width: 150px;
        border: 4px solid #d1e0ff;
    }

    .doctor-card h3 {
        font-size: 1.5rem;
        margin: 15px 0 10px;
        color: #333;
    }

    .doctor-card p {
        color: #555;
        font-size: 1.4rem;
        margin: 10px 0;
    }

    .doctor-card .details {
        padding: 20px;
        background-color: #e9f2ff;
    }

    .doctor-card .details p {
        margin: 5px 0;
    }
</style>

<body>
    <?php
    // Check for errors
    if ($result->num_rows > 0) {
        echo "<h2>Doctor Nearby</h2>";
        echo "<div class='container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='doctor-card'>";

            // Assuming you have a 'image_path' column in your 'doctors' table
            if (!empty($row['image'])) {
                $imagePath = $row['image']; // Replace with your image path logic (absolute or relative)
                echo "<img src='$imagePath' alt='Dr. " . $row['name'] . "'>";
            } else {
                echo "<img src='images/doctor-placeholder.png' alt='Doctor Placeholder'>"; // Placeholder image
            }

            echo "<div class='details'>";
            echo "<h3>Dr. " . $row['name'] . "</h3>";
            echo "<p>Specialty: " . $row['specialty'] . "</p>";
            echo "<p>Location: " . $row['location'] . "</p>";
            echo "<p>Phone No: " . $row['phone'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<h2>No doctors found matching your criteria.</h2>";
    }

    $conn->close();
    ?>
</body>

</html>

