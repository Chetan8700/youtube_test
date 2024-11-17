<?php
session_start(); // Start session to store messages

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = $_POST['farmer_username'];
    $password = $_POST['farmer_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Database connection parameters
    $servername = "localhost";
    $dbname = "dbmsphase2";  // Replace with your database name
    $db_username = "root";    // Default for XAMPP
    $db_password = "22311666";        // Default for XAMPP (no password)

    // Create a connection to MySQL
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO farmers (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful, redirect to another page
        $_SESSION['message'] = "Registration successful!";
        header("Location: success.php"); // Change to your desired page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
