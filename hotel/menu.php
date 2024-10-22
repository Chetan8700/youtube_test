<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// Include your DB connection
include 'db.php';

// Display the message if it exists
if (isset($_SESSION['add_to_cart_message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['add_to_cart_message'] . '</div>';
    unset($_SESSION['add_to_cart_message']); // Clear the message after displaying
}


// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $itemName = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $mealType = $_POST['mealType'];
    $spiceLevel = $_POST['spiceLevel'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = [
        'name' => $itemName,
        'quantity' => $quantity,
        'mealType' => $mealType,
        'spiceLevel' => $spiceLevel
    ];

    $_SESSION['add_to_cart_message'] = "Added $itemName to the cart!";
    header('Location: menu.php'); // Redirect to the same page to avoid resubmission
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylemenu.css">
</head>

<body>
<div class="banner-section-bg-container d-flex justify-content-center flex-column">
    <div class="text-center">
        <h1 class="banner-heading mb-3">Welcome to Foodmunch</h1>
        <p class="banner-caption">Hello, <?php echo $_SESSION['username']; ?>! Here are the available options:</p>
        <div class="button-container">
            <a class="custom-outline-button" href="cart.php">View Cart</a>
            <a class="custom-button" href="logout.php">Logout</a>
        </div>
    </div>
</div>

<div class="explore-menu-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="menu-section-heading">Explore Menu</h1>
            </div>

            <!-- Sample Item Card (repeat for each menu item) -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728889552/pexels-anilsharma65-10905933_tqucxm.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Paneer Butter Masala</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Paneer Butter Masala">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728889502/veg-biryani-veg-pulav-fried-rice-indian-food-generative-ai_squ9qu.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Vegetable Biryani</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Vegetable Biryani">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit"  onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728889496/delicious-indian-dosa-composition_nwcikh.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Masala Dosa</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Masala Dosa">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728889496/high-angle-pakistani-dish-with-meat_d4npyr.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Palak Paneer</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Palak Paneer">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728984733/pav_bhaji_1_j8swuz.png"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Pav Bhaji</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Pav Bhaji">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728984728/kashmiri_dum_allo_pwtxbv.png"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Kashmiri Dum Aloo</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Kashmiri Dum Aloo">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728984727/allo_paratha_zxcrsl.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Aloo Paratha</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Aloo Paratha">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" onclick="addToCart()" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="shadow-lg rounded menu-item-card p-4 mb-4 bg-white">
                    <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1728984727/dal_kihchadi_ytjyjq.jpg"
                         class="menu-item-image w-100 rounded mb-3" alt="Paneer Butter Masala"/>
                    <h2 class="menu-card-title text-center mb-3" style="font-weight: 600;">Khichdi</h2>

                    <!-- Form to Add Item to Cart -->
                    <form method="POST" action="menu.php">
                        <input type="hidden" name="item_name" value="Khichdi">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="mealType">Meal Type</label>
                            <select id="mealType" name="mealType" class="form-control custom-select" required>
                                <option value="regular">Regular Meal</option>
                                <option value="jain">Jain Meal</option>
                                <option value="no_onion_garlic">No Onion, No Garlic</option>
                                <option value="gluten_free">Gluten-Free</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spiceLevel">Spice Level</label>
                            <select id="spiceLevel" name="spiceLevel" class="form-control custom-select" required>
                                <option value="mild">Mild</option>
                                <option value="medium">Medium</option>
                                <option value="spicy">Spicy</option>
                            </select>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" name="add_to_cart" class="btn btn-block btn-warning text-white font-weight-bold mt-4" style="background-color: #d0b200;">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>

</body>

</html>
