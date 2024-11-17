<?php
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Check if the session has been successfully destroyed
if (session_status() == PHP_SESSION_NONE) {
    // Redirect to index.php after 2 seconds
    echo "<script>
            alert('You have successfully logged out!');
            window.location.href = 'index.php';
          </script>";
    exit();
}
?>
