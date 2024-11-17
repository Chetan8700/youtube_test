<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Database connection parameters
$servername = "localhost";
$dbname = "dbmsphase2"; // Replace with your database name
$db_username = "root"; // Default for XAMPP
$db_password = "22311666"; // Default for XAMPP

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produce_name = $_POST['produce_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO produce (farmer_username, produce_name, quantity, price) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE quantity=?, price=?");
    $stmt->bind_param("ssiiii", $_SESSION['username'], $produce_name, $quantity, $price, $quantity, $price);
    $stmt->execute();
    echo "Produce added/updated successfully!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update Produce</title>
    <style>
        body {
            background-image: url('magicstudio-art.jpg'); /* Replace with your background image path */
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Add/Update Your Produce</h2>
    <form method="POST">
        <label for="produce_name">Produce Name:</label>
        <select id="produce_name" name="produce_name" required>
            <option value="maize">Maize</option>
            <option value="tomato">Tomato</option>
            <option value="watermelon">Watermelon</option>
            <option value="groundnut">Groundnut</option>
            <option value="carrot">Carrot</option>
            <option value="cucumber">Cucumber</option>
        </select>
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        
        <button type="submit">Submit</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>