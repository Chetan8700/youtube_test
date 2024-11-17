
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div id="section1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 custom-navbar">
                        <div class="container-fluid">
                            <!-- Animated Logo aligned to the left -->
                            <a class="navbar-brand p-0 m-0" href="#">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1726913951/Farma_Deal_ink_kguqvi.png" class="farma-deal-logo" />
                            </a>
                            <!-- Navbar toggler for mobile view -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Centered Navbar Links -->
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active mx-3" id="navItem1" href="#">Home</a>
                                    <a class="nav-link mx-3" href="#" id="navItem2">About</a>
                                    <a class="nav-link mx-3" href="#sectionCrops" id="navItem3">Crops</a>
                                    <a class="nav-link mx-3" href="#" id="navItem4">My Cart</a>
                                </div>
                            </div>
                        </div>
                    </nav>

                </div>
                <div class="col-12">
                    <section class="video-background-container">
                        <video autoplay muted loop class="background-video">
                            <source src="https://res.cloudinary.com/dnxijnw0s/video/upload/v1727613487/1110124_Hiker_Backpacker_1920x1080_m0kfl9.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class=" content-overlay  d-flex justify-content-center flex-column">
                            <div class="text-center">
                                <h1 class="banner-heading mb-3">Turning Crops into Connections</h1>
                                <p class="banner-caption mb-4">Connecting Farms to Markets, Seamlessly</p>
                                <button class="custom-button" onclick="display('section2')">Login</button>
                                <button class="custom-outline-button" onclick="display('')">View More</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="wcu-section pt-5 pb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="wcu-section-heading">Why Choose Farma Deal?</h1>
                        <p class="wcu-section-description">
                            Empowering Farmers, Connecting Markets
                        </p>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="wcu-card p-3 shadow-lg d-flex flex-column align-items-center text-center">
                            <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1726916522/4dt_lp3oll.jpg" class="wcu-card-image mb-3" />
                            <h1 class="wcu-card-title mt-3"> Direct Farm-to-Business Connection</h1>
                            <p class="wcu-card-description">
                                Enabling direct communication and fair deals between farmers and businesses for greater transparency.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="wcu-card p-3 mb-3 shadow-lg d-flex flex-column align-items-center text-center">
                            <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1726918349/5031659_hvf4no.jpg" class="wcu-card-image" />
                            <h1 class="wcu-card-title mt-3">Market Insights & Analytics</h1>
                            <p class="wcu-card-description">
                                Access real-time data and insights to make informed decisions, optimizing your operations and profitability.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="wcu-card p-3 mb-3 shadow-lg d-flex flex-column align-items-center text-center">
                            <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1726918360/m010t0531_c_social_media_14sep22_kpeeml.jpg" class="wcu-card-image" />
                            <h1 class="wcu-card-title mt-3">Secure Transactions</h1>
                            <p class="wcu-card-description">
                                Our platform ensures safe, reliable payments and seamless transactions, giving you peace of mind every step of the way.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="explore-menu-section pt-5 pb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 class="menu-section-heading text-center">Seasonal Delights</h1>
                    </div>
                    <!-- Card 1 -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612738/WhatsApp_Image_2024-09-29_at_17.12.15_27a50a89_hfbhjb.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Barley</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612737/WhatsApp_Image_2024-09-29_at_17.12.15_10c7453c_vv4bge.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Wheat</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612737/WhatsApp_Image_2024-09-29_at_17.12.15_2035a724_a1u353.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Maize</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612737/WhatsApp_Image_2024-09-29_at_17.12.14_c27ea358_dfo9tr.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Tomato</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612737/s_tcbea6.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Watermelon</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="menu-item-card shadow p-3 mb-3 d-flex flex-column">
                            <div class="menu-image-container">
                                <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1727612737/WhatsApp_Image_2024-09-29_at_17.12.14_7188d44c_qzz6ch.jpg" class="menu-item-image" />
                            </div>
                            <h1 class="menu-card-title">Groundnut</h1>
                            <a href="" class="menu-item-link mt-auto">
                                Check Buying Options
                                <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="#d0b200" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
           
            <div class="custom-stories-container">
                <h2 class="success-stories-title">Success Stories: Farmer Journeys</h2>
                <p class="success-stories-intro">
                    Discover the inspiring journeys of our farmers as they share their stories of resilience, innovation, and success in the agricultural world.
                    Watch these short videos to learn how they overcame challenges and thrived in their farming endeavors.
                </p>
            </div>
            <div class="success-stories-container">
                <div class="video-card">
                    <h3 class="farmer-name">Sustainable Agriculture: A Toolkit for Farmers</h3>
                    <iframe src="https://agritoolkit.eu/" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="video-card">
                    <h3 class="farmer-name">Increasing Profitability Through Sustainable Practices</h3>
                    <iframe src="https://methodrecycling.com/world/journal/sustainability-and-profitability" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="video-card">
                    <h3 class="farmer-name">Sustainable Agriculture: Profitability and Productivity</h3>
                    <iframe src="https://www.sciencedirect.com/science/article/abs/pii/S0308521X2300046X" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <footer class="footer">
                <div class="footer-container">
                    <div class="footer-column">
                        <h2>About Us</h2>
                        <img src="https://res.cloudinary.com/dnxijnw0s/image/upload/v1726913951/Farma_Deal_ink_kguqvi.png" alt="farma deal Solution Logo" class="footer-logo">
                        <p>Farma Deals</p>
                        <div class="custom-social-btns">
                            <a class="custom-btn" style="--custom-color: #3B5998;">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                            <a class="custom-btn" style="--custom-color: #3CF;">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                            <a class="custom-btn" style="--custom-color: #E73F29;">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                        </div>
                    </div>

                    <div class="footer-column">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="#">contact us</a></li>
                            <li><a href="#">Our projects</a></li>
                            <li><a href="#">Upcomings</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h2>Official Info</h2>
                        <p>+91 11111111111</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>Copyright © 2024 <span class="span-footer-element">Farma Deals</span>. All Right Reserved</p>
                </div>
            </footer>
        </div>
    </div>
    <div id="section2">
    <div class="farma-gradient">
        <div class="farma-container">
            <div class="farma-login-card">
                <h2 class="farma-title">Welcome to Farma Deal</h2>
                <form class="farma-login-form" action="login.php" method="post"> <!-- Change action to index.php -->
                    <div class="farma-input-group">
                        <label for="username" class="farma-label">Username</label>
                        <input type="text" name="username" id="username" class="farma-input" placeholder="Enter your username" required>
                    </div>
                    <div class="farma-input-group">
                        <label for="password" class="farma-label">Password</label>
                        <input type="password" name="password" id="password" class="farma-input" placeholder="Enter your password" required>
                        <button type="button" onclick="togglePasswordVisibility()" class="toggle-password">Show</button>
                    </div>
                    <button type="submit" class="farma-login-btn">Login</button>
                    <p class="farma-signup-text">Don’t have an account? <button class="btn btn-success" onclick="display('section3')">Sign up</button></p>
                </form>
            </div>
            <div class="mt-4">
                <button class="btn btn-success" onclick="display('section1')">Home</button>
            </div>
        </div>
    </div>
</div>



<div id="section3">
    <section class="signup-container">
        <div class="form-wrapper">
            <h2 class="signup-title">Sign Up</h2>
            <div class="form-groups">
                <div class="form-group farmer-form">
                    <h3>Farmer Signup</h3>
                    <form id="farmerForm" method="POST" action="signup_farmer.php"> <!-- Changed action here -->
                        <div class="input-group">
                            <label for="farmer_username" class="label-text text-dark">Username</label>
                            <input type="text" name="farmer_username" id="farmer_username" class="input-field" required />
                        </div>
                        <div class="input-group">
                            <label for="farmer_password" class="label-text text-dark">Password</label>
                            <input type="password" name="farmer_password" id="farmer_password" class="input-field" required />
                        </div>
                        <button type="submit" class="signup-button" value="Register">Sign Up</button>
                    </form>
                </div>

                
            </div>

            <div class="mt-4">
                <button class="btn btn-success" onclick="display('section1')">Home</button>
            </div>
        </div>
    </section>
</div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
    <script src="//code.tidio.co/pyih4c5tn57lmqs32f3engadzpkfta7q.js" async></script>
</body>

</html>