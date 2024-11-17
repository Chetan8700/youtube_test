<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AgroFarming</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        header {
            background-color: #1e3a8a;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6b7280 0%, transparent 70%);
            opacity: 0.2;
        }

        header h1 {
            font-size: 2.5rem;
            letter-spacing: 1px;
            margin: 0;
        }

        header p {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .logout-link {
            background-color: #ef4444;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .logout-link:hover {
            background-color: #b91c1c;
        }

        /* Explore Section */
        .explore-menu-section {
            background-color: #e5e7eb;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .menu-section-heading {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 30px;
        }

        /* Interactive Cards */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .col {
            flex: 1 1 calc(33% - 20px);
            max-width: 100%;
        }

        .menu-item-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .menu-item-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .menu-image-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
            border-radius: 10px;
        }

        .menu-item-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-item-card:hover .menu-item-image {
            transform: scale(1.1);
        }

        .menu-card-title {
            font-size: 1.5rem;
            margin: 15px 0;
            color: #374151;
        }

        .menu-item-link {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .menu-item-link svg {
            transition: transform 0.3s ease;
        }

        .menu-item-link:hover {
            color: #1d4ed8;
        }

        .menu-item-link:hover svg {
            transform: translateX(5px);
        }

        /* Farmer's and Retailer's Section */
        .main-content {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            background-color: #10b981;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .btn:hover {
            background-color: #059669;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .col {
                flex: 1 1 100%;
            }

            .menu-section-heading {
                font-size: 1.8rem;
            }

            .btn {
                width: 100%;
                padding: 14px 0;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Welcome to AgroFarming Dashboard</h1>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="logout.php" class="logout-link">Logout</a>
    </header>

    <div class="explore-menu-section">
        <h2 class="menu-section-heading">Seasonal Delights</h2>
        <div class="main-content">
            <h2>Farmer's Section</h2>
            <a href="add_produce.php" class="btn">Add/Update Produce</a>

            <h2>Retailer's Section</h2>
            <a href="view_produce.php" class="btn">View Produce</a>
        </div>

        <div class="row">
            <!-- Card 1: Maize -->
            <div class="col">
                <div class="menu-item-card">
                    <div class="menu-image-container">
                        <img src="maize.webp" class="menu-item-image" alt="Maize">
                    </div>
                    <h1 class="menu-card-title">Maize</h1>
                    <a href="view_produce.php" class="menu-item-link">
                        Check Buying Options
                        <svg width="16px" height="16px" viewBox="0 0 16 16" fill="#2563eb" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 2: Tomato -->
            <div class="col">
                <div class="menu-item-card">
                    <div class="menu-image-container">
                        <img src="tomato.jpg" class="menu-item-image" alt="Tomato">
                    </div>
                    <h1 class="menu-card-title">Tomato</h1>
                    <a href="view_produce.php" class="menu-item-link">
                        Check Buying Options
                        <svg width="16px" height="16px" viewBox="0 0 16 16" fill="#2563eb" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 3: Watermelon -->
            <div class="col">
                <div class="menu-item-card">
                    <div class="menu-image-container">
                        <img src="watermelon.jpg" class="menu-item-image" alt="Watermelon">
                    </div>
                    <h1 class="menu-card-title">Watermelon</h1>
                    <a href="view_produce.php" class="menu-item-link">
                        Check Buying Options
                        <svg width="16px" height="16px" viewBox="0 0 16 16" fill="#2563eb" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 4: Groundnut -->
            <div class="col">
                <div class="menu-item-card">
                    <div class="menu-image-container">
                        <img src="groundnut.jpg" class="menu-item-image" alt="Groundnut">
                    </div>
                    <h1 class="menu-card-title">Groundnut</h1>
                    <a href="view_produce.php" class="menu-item-link">
                        Check Buying Options
                        <svg width="16px" height="16px" viewBox="0 0 16 16" fill="#2563eb" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Additional Cards: Add similar structure for Cucumber, Carrot, etc. -->
        </div>
    </div>
</div>

</body>
</html>
