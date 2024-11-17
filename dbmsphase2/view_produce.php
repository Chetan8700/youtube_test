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

// Fetch produce from the database
$sql = "SELECT * FROM produce";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Produce</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        button.buy-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button.buy-btn:hover {
            background-color: #0056b3;
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
    <script>
        function showPurchaseAlert(id) {
            if (confirm("Are you sure you want to purchase this item?")) {
                // Make an AJAX request to delete the item
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_produce.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Item purchased successfully!");
                        // Reload the page to reflect the changes in the table
                        location.reload();
                    }
                };
                xhr.send("id=" + encodeURIComponent(id));
            }
        }
    </script>
</head>
<body>
    <h2>Available Produce</h2>
    <table>
        <thead>
            <tr>
                <th>Produce Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['produce_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td>
                        <button class="buy-btn" onclick="showPurchaseAlert(<?php echo htmlspecialchars($row['id']); ?>)">Buy</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No produce available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

<?php
$conn->close();
?>
