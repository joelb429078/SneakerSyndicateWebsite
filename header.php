<?php
    include_once 'connect.php';
    session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!--==Using-Font-Awesome-for-Icons=====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <title>Sneaker Sydnicate</title>
</head>
<body>
<!-- navigation section -->
<div class="navigation">
        <div class="container">
            <div class="navbar">
                <div class="brand-name">
                    <h1>Sneaker Syndicate</h1> <!-- Brand name section -->
                </div>
                <div class="logo-toggle-container">
                    <a href="index.php">
                        <img src="./img/SneakSyndicateLogo.png" alt="" /> <!-- Brand logo -->
                    </a>
                    <span class="toggle-box">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <ul class="menu">  <!-- main menu section with primary pages linked -->
                    <li><a href="index.php">Home</a>
                    <li>
                        <a href="about us.php">About Us</a>
                    </li>
                    <li>
                        <a href="additionalinfopartners.php" class="menu-link">Partners</a>
                    </li>
                    <li>
                        <a href="opportunities.php" class="menu-link">Opportunities</a>
                    </li>
                    <li>
                        <a href="contact.php" class="menu-link">Contact Us</a>
                    </li>
                </ul>
                <div class='icons'>
                <?php
                
                if (isset($_SESSION["SessionUserID"])) {
                    if (isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = array();
                        $user_id = $_SESSION["SessionUserID"];

                        $sql = "SELECT COUNT(*) FROM basket WHERE UserID='$user_id'";
                        $result = mysqli_query($conn, $sql);

                        // Get the count from the query result
                        $num_rows = mysqli_fetch_array($result)[0];
        
                        // Check if user is admin
                        $admin_check_query = "SELECT AdminAccess FROM users WHERE UserID='$user_id'";
                        $admin_check_result = mysqli_query($conn, $admin_check_query);
                        $admin_access = mysqli_fetch_array($admin_check_result)[0];

                        if ($admin_access == 1) {
                            // Redirect to dashboard if user is admin
                            echo "<p>$num_rows</p>";
                            echo "<a href='cart.php'><i class='fa fa-shopping-cart'></i></a>";
                            echo "<a href='DASHBOARD/index.php?userid='><i class='fa fa-user'></i></a>";
                        } elseif ($num_rows > 0) {
                            echo "<p>$num_rows</p>";
                            echo "<a href='cart.php'><i class='fa fa-shopping-cart'></i></a>";
                            echo "<a href='userarea.php?userid='><i class='fa fa-user'></i></a>"; //if user is logged in the user icon redirects to userarea page
                        } else {
                            echo "<p>0</p>";
                            echo "<a href='cart.php'><i class='fa fa-shopping-cart'></i></a>";
                            echo "<a href='userarea.php?userid='><i class='fa fa-user'></i></a>"; //if user is logged in the user icon redirects to userarea page
                        }
                    } else {
                        echo "<p>0</p>";
                        echo "<a href='login.php'><i class='fa fa-shopping-cart'></i></a>";
                        echo "<a href='login.php?userid='><i class='fa fa-user'></i></a>"; //if cart session has began then the user icon redirects to singinpage
                    }
                } else {
                    echo "<p>0</p>";
                    echo "<a href='login.php'><i class='fa fa-shopping-cart'></i></a>";
                    echo "<a href='login.php?userid='><i class='fa fa-user'></i></a>"; //if user is logged in the user icon redirects to userarea page
                }
                ?>
                </div>
                <div class="searchactivator">

                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <!--dropdown navigation bar section -->
        <nav class="navibar">
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <!-- Menu item for raffles -->
                    <li>
                        <a href="raffles.php" class="menu-link" style="font-weight:600;color:#97b332;">
                            Raffle
                        </a>
                    </li>
                    <!-- Menu item for accessories -->
                    <li>
                        <a href="#" class="menu-link">
                            Accessories
                            <span class="drop-icon">
                                <i class="fas fa-chevron-down"></i> 
                            </span>
                        </a>
                        <!-- Sub-menu for accessories -->
                        <div class="sub-menu">
                            <!-- Sub-menu item for men's accessories -->
                            <div class="sub-menu-item">
                                <h4>Mens</h4> <!-- Category name -->
                                <!-- Product links for men's accessories -->
                                <ul>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=27">Tommy Hilfiger Bucket Hat</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=17">Burberry Bag</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=25">Palm Angels Wallet</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=23">Louis Vuitton Duffel Bag</a></li>
                                    <li><a href="mensaccessoriesog.php"><b>view all</b></a></li>
                                </ul>
                            </div>
                            <!-- Sub-menu item for women's accessories -->
                            <div class="sub-menu-item">
                                <h4>Womens</h4> <!-- Category name -->
                                <!-- Product links for women's accessories -->
                                <ul>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=37">Louis Vuitton Handbag</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=41">Polo Belt</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=33">Canada Goose Hat</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=31">Burberry Handbag</a></li>
                                    <li><a href="womensaccessoriesproductpage.php"><b>view all</b></a></li>
                                </ul>
                            </div>
                            <!-- Sub-menu item for kid's accessories -->
                            <div class="" style="padding-left: 0;transition: all 0.4s ease-in-out;">
                                <h4 style="text-transform: capitalize; font-size: 1rem; padding: 0.5rem 0;">Kids</h4> <!-- Category name -->
                                <!-- Product links for kid's accessories -->
                                <ul>
                                    <li style="text-transform: capitalize; padding: 0.2rem 0; margin: 0.2rem 0; font-size: 0.95rem; transition: all 0.5s ease;"><a href="kidsaccessoriesproductpage.php?ProductID=12">Polo Gloves</a></li>
                                    <li style="text-transform: capitalize; padding: 0.2rem 0; margin: 0.2rem 0; font-size: 0.95rem; transition: all 0.5s ease;"><a href="kidsaccessoriesproductpage.php?ProductID=10">Nike Hat</a></li>
                                    <li style="text-transform: capitalize; padding: 0.2rem 0; margin: 0.2rem 0; font-size: 0.95rem; transition: all 0.5s ease;"><a href="kidsaccessoriesproductpage.php?ProductID=6">Gucci Hat</a></li>
                                    <li style="text-transform: capitalize; padding: 0.2rem 0; margin: 0.2rem 0; font-size: 0.95rem; transition: all 0.5s ease;"><a href="kidsaccessoriesproductpage.php?ProductID=8">Jordan Bag</a></li>
                                    <li style="text-transform: capitalize; padding: 0.2rem 0; margin: 0.2rem 0; font-size: 0.95rem; transition: all 0.5s ease;"><a href="kidsaccessoriesog.php"><b>view all</b></a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <img style="transform:translateX(-70%;)" src="img/accessories/Kids/Jordan/bag/red/red1.jpg" alt="product image">
                            </div>
                        </div>
                    </li>
                    <!-- Menu item for designer -->
                    <li>
                        <a href="#" class="menu-link">
                            Designer
                            <span class="drop-icon">  <!-- Category name -->
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <!-- Sub-menu for a variety of designer items -->
                        <div class="sub-menu">
                            <div class="sub-menu-item">
                                <h4>top items</h4> <!-- Sub menu section for top items -->
                                <!-- Product links for top items -->
                                <ul>
                                    <li><a href="mensproductpage.php?ProductID=130">Palm Angels Hoodie</a></li>
                                    <li><a href="mensproductpage.php?ProductID=149">Versace Tshirt</a></li>
                                    <li><a href="mensproductpage.php?ProductID=115">Gucci Hoodie</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=29">Versace Shoulder Bag</a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h4>other categories</h4> <!-- Sub menu section for other categories to shop-->
                                <!-- Product links for these items -->
                                <ul>
                                    <li><a href="kidsaccessoriesproductpage.php">Kid's accessories</a></li>
                                    <li><a href="mensaccessoriesproductpage.php">Men's accessories</a></li>
                                    <li><a href="womensaccessoriesproductpage.php">Womens's Accessories</a></li>
                                    <li><a href="kidsproductpage.php">kid's clothing</a></li>
                                </ul>
                            </div>
                            <!-- Sub-menu with information and image of designer brands -->
                            <div class="sub-menu-item">
                                <h2>stylish and modern fashion clothing</h2> <!-- Header-->
                                <button type="button" onclick="window.location.href='additionalinfopartners.php'" class="submenubtn">Learn More</button> <!-- link to partners page with detail about designer brands being supplied -->
                            </div>
                            <div class="sub-menu-item">
                                <img src="/img/accessories/Womens/Nike/cap/yellow/yellow1.jpg" alt="product image"> <!-- promotional product image -->
                            </div>
                        </div>
                    </li>
                    <!-- Menu item for clothing -->
                    <li>
                        <a href="#" class="menu-link">
                            Clothing
                            <span class="drop-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <div class="sub-menu">
                            <div class="sub-menu-item">
                                <h4>Men's Clothing</h4>  <!-- Category name -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="mensproductpage.php?ProductID=116">Gucci Jogger</a></li>
                                    <li><a href="mensproductpage.php?ProductID=126">North Face Coat</a></li>
                                    <li><a href="mensproductpage.php?ProductID=139">Tommy Hilfiger Jogger</a></li>
                                    <li><a href="mensproductpage.php?ProductID=149">Versace Tshirt</a></li>
                                    <li><a href="mensproductpage.php?ProductID=112">Canada Goose Coat</a></li>
                                    <li><a href="mensproductsog.php"><b>view all</b></a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h4>Women's Clothing</h4>  <!-- Category name -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="womensproductpage.php?ProductID=157">Burberry Tshirt</a></li>
                                    <li><a href="womensproductpage.php?ProductID=161">Canada Goose Coat</a></li>
                                    <li><a href="womensproductpage.php?ProductID=164">Gucci Hoodie</a></li>
                                    <li><a href="womensproductpage.php?ProductID=175">North Face Coat</a></li>
                                    <li><a href="womensproductpage.php?ProductID=178">Palm Angels Hoodie</a></li>
                                    <li><a href="womensproductsog.php"><b>view all</b></a></li>
                                </ul>   
                            </div>
                            <div class="sub-menu-item">
                                <h2>the Kid's Clothing is here</h2>  <!-- Category name -->
                                <button type="button" onclick="window.location.href='kidsproductpage.php'" class="submenubtn">shop here</button>
                            </div>
                            <div class="sub-menu-item">
                                <img src="/img/clothes/Mens/Nike/hoodie/navy/navy3.jpg" alt="product image">
                            </div>
                        </div>
                    </li>
                    <!-- Menu item for footwear -->
                    <li>
                        <a href="#" class="menu-link">
                            Footwear
                            <span class="drop-icon">  <!-- Category name -->
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <div class="sub-menu">
                            <div class="sub-menu-item">
                                <h4>Nike Footwear</h4>  <!-- Category subsection -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="shoeindvproductpage.php?ProductID=195">Air Force 1</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=223">Vapormax Plus</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=218">Vapormax 2021</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=202">Air Max 97</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=210">Blazer</a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h4>Yeezy Footwear</h4>  <!-- Category sub section -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="shoeindvproductpage.php?ProductID=98">Yeezy Slide - Green</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=94">Yeezy 350 - White</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=95">Yeezy Runner - Brown</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=92">Yeezy 350 - Blue</a></li>
                                    <li><a href="shoeindvproductpage.php?ProductID=99">Yeezy Slide - Black</a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h2>gear up with the latest creps</h2>
                                <button type="button" onclick="window.location.href='shoesproductsog.php'" class="submenubtn">Click Here</button>
                            </div>
                            <div class="sub-menu-item">
                                <img src="/img/shoes/Nike/vapormax%20plus/blue/blue1.jpg" alt="product image">
                            </div>
                        </div>
                    </li>
                    <!-- Menu item for additional 'extra' items -->
                    <li>
                        <a href="#">
                            Extras <!--sub menu section name -->
                            <span class="drop-icon">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <div class="sub-menu">
                            <div class="sub-menu-item">
                                <h4>Womens extras</h4> <!-- Category name -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=35">Hermes Lipstick</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=34">Gucci Bagg</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=40">Palm Angels Shoulder Bag</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=30">Adidas Bag</a></li>
                                    <li><a href="womensaccessoriesproductpage.php?ProductID=37">Louis Vuitton HandBag</a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h4>Mens additionals</h4>  <!-- Category name -->
                                <!-- Product links-->
                                <ul>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=23">Louis Vuitton Duffel</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=26">Polo Scarf</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=29">Versace Shoulder Bag</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=25">Palm Angels Wallet</a></li>
                                    <li><a href="mensaccessoriesproductpage.php?ProductID=20">Gucci Belt</a></li>
                                </ul>
                            </div>
                            <div class="sub-menu-item">
                                <h2>Learn more about exclusive partnerships</h2> <!-- Partnership information header -->
                                <button type="button" onclick="window.location.href='additionalinfopartners.php'" class="submenubtn">Click Here</button> <!-- Link to redirect to partners information -->
                            </div>
                            <div class="sub-menu-item">
                                <img src="img/accessories/Mens/Adidas/shoulder%20bag/black/black1.jpg" alt="product image">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Search pop-up overlay with search bar -->
    <div class="searchoverlay" id="searchoverlay">
        <div class="mainsearchbar">
            <input type="text" name="search" id="search" placeholder="Type to search" autocomplete="chrome-off"> <!-- Search input field-->
            <button class="searchbarmainbtn"><i class="fa fa-search"></i></button> <!-- Search icon -->
            <div class="results"> <!-- Results section -->
                <ul> <!-- Result drop down list area -->
                </ul>
            </div>
        </div> 
        <span class="searchclosebtn" onclick="closesearch()" title="close">X</span> <!-- Close icon /button -->
    </div>
