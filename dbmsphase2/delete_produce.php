<?php
session_start();

// Database connection parameters
$servername = "localhost";
$dbname = "dbmsphase2"; // Replace with your database name
$db_username = "root"; // Default for XAMPP
$db_password = "22311666"; // Default for XAMPP

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produce_id = $_POST['id'];

    // Delete the produce item from the database
    $stmt = $conn->prepare("DELETE FROM produce WHERE id = ?");
    $stmt->bind_param("i", $produce_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Item deleted successfully!";
    } else {
        echo "Error deleting item.";
    }

    $stmt->close();
}

$conn->close();
?>
