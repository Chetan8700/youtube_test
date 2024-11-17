<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture login credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // Prepare and execute SQL statement to fetch the user's password hash
    $sql = "SELECT password FROM farmers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the username exists
    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username; // Store username in session
            header("Location: dashboard.php"); // Redirect to a dashboard or another page
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Invalid username or password!";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
