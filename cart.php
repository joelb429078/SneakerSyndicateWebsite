<?php

include_once 'header.php';
require 'connect.php';
require 'shoppingcartcode.php';
?>

    <div class="checkoutcont" id="checkoutcartdiv">
        <?php
            // Define variables and initialize with empty values
            if(isset($_SESSION['SessionUserID'])){
                // Session has been started and user_id is set
                if(isset($_SESSION['cart'])){
                    $user_id = $_SESSION['SessionUserID'];

                    $sql = "SELECT COUNT(*) FROM basket WHERE UserID='$user_id'";
                    $result = mysqli_query($conn, $sql);

                    // Get the count from the query result
                    $num_rows = mysqli_fetch_array($result)[0];

                    // Get the number of rows returned by the query
                    // Check if the query was successful
                    if ($num_rows > 0) {
                      echo '<header class="cartcont">
                            <h1>Shopping cart</h1>
                            <span class="shopcartitemcount">
                                <b id="cartcounter">'.$num_rows.'</b> items in the bag
                            </span>
                        </header>';
                    } else {
                        $nothing_msg = "There are no products in your cart."; // If no products are in the cart this div element is outputted alerting the user of this 
                        echo'
                        <header class="cartcont">
                            <h1>Shopping cart</h1>
                            <span class="shopcartitemcount">
                                <b id="cartcounter">0</b> items in the bag
                            </span>
                        </header>
                        <div class="shopcartemptyproduct" style="margin-bottom:5%;margin-top:5%;">
                            <h3>There are no products in your cart.</h3>
                            <a href="index.php">Carry On Shopping</a>
                        </div>';
                    }

                }else{
                    $_SESSION['cart'] = array(); // Establishes cart array in web cookies
                }
            
            }else {
                $nousercart_msg ="You must log in first!"; // Prompts user to log in before attempting to access basket 
                echo'
                    <header class="cartcont">
                        <h1>Shopping cart</h1>
                        <span class="shopcartitemcount">
                            <b id="cartcounter">0</b> items in the bag
                        </span>
                    </header>
                    <div class="shopcartemptyproduct" style="margin-bottom:5%;margin-top:5%;">
                        <h3>You must log in first!</h3>
                        <a href="index.php">Carry On Shopping</a>
                    </div>';
            }
        ?>
        <div class="shopcart">
            <div class="shopcartcont">
                <ul class="shopcartproducts" id="cart">
                <?php
                // Check if the user is logged in by checking if the SessionUserID variable is set in the session
                if (isset($_SESSION['SessionUserID'])) {
                    // Get the user ID from the session variable
                    $user_id = $_SESSION['SessionUserID'];
                    // Check if the cart variable is set in the session
                    if (isset($_SESSION['cart'])) {
                        // Select all items from the basket table where the UserID matches the current user's ID
                        $query = "SELECT * FROM basket WHERE UserID = '$user_id'";
                        $result = mysqli_query($conn, $query);

                        // Check if $result is a valid MySQLi result object
                        if ($result && mysqli_num_rows($result) > 0) {
                            // Loop through each row in the result set and display the cart item
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li class="shopcartitemrow" id="">
                                    <div class="shopcolleft">
                                        <div class="shopcartitemthumb">
                                            <a href="">
                                                <!-- Display the product image -->
                                                <img src="<?php echo $row["ImgLink"];?>1.jpg"/>
                                            </a>
                                        </div>
                                        <div class="shopcartdetails">
                                            <div class="shopcartitemname">
                                                <a href="">
                                                    <!-- Display the product brand and name -->
                                                    <?php echo $row["ProductBrand"];?> <?php echo $row["ProductName"];?>
                                                </a>
                                            </div>
                                            <div class="shopcartitemdesc">
                                                <!-- Display the product color and size -->
                                                Color - <?php echo $row["Colourway"];?> , Size- <?php echo $row["ProductSize"];?>
                                            </div>
                                            <div class="shopcartitemprice">
                                                <!-- Display the product price -->
                                                £<?php echo $row["ProductPrice"];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shopcolright">
                                        <div class="quantity">
                                            <!-- Display the product quantity input field and set its value to the quantity stored in the database -->
                                            <input type="text" name="quantity" class="quantity" data-product-id="<?php echo $row["ProductID"]; ?>" value="<?php echo $row["Quantity"]; ?>" />
                                        </div>
                                        <div class="remove">
                                            <form method="post" action="">
                                                <input type="hidden" name="product_id" value="<?php echo $row["ProductID"];?>"/>
                                                <!-- Display the remove button for the current item -->
                                                <button type="submit" name="remove_item"><i class="fas fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                    }
                }

                // Remove product if "remove_item" button is clicked
                if (isset($_POST['remove_item']) && isset($_POST['product_id'])) {
                    $product_id = $_POST['product_id'];
                    $user_id = $_SESSION['SessionUserID'];
                    $query = "DELETE FROM basket WHERE ProductID = '$product_id' AND UserID = '$user_id'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo '<script>alert("Product removed successfully.")</script>';
                    } else {
                        echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
                    }
                }
                ?>


                </ul>
            </div>
            <div class="shopcartcont">
                <div class="shopcartpromo">
                    <label for="shopcartpromocode">Enter your promotional code</label>
                    <input type="text" />
                    <button type="button" class="shopcartbtn"></button>
                </div>
                <div class="shopcartsummary">
                    <ul class="shopcartlisted">
                        <?php
                            // Select all items in the cart for the given UserID
                            $sql = "SELECT * FROM basket WHERE UserID='$user_id'";
                            $result = mysqli_query($conn, $sql);

                            // Initialize the total price to 0
                            $subtotalPrice = 0;

                            // Loop through each item in the cart
                            while ($row = mysqli_fetch_assoc($result)) {
                              // Get the quantity and price of the current item
                              $quantity = $row['Quantity'];
                              $price = $row['ProductPrice'];

                              // Calculate the subtotal for the current item
                              $itemtotal = $quantity * $price;

                              // Add the subtotal to the total price
                              $subtotalPrice += $itemtotal;
                            }
                            $tax = 0.05 * $subtotalPrice;
                            $shipping = 0.1 * $subtotalPrice;
                            $total = $shipping + $tax + $subtotalPrice;
                            $_SESSION['total'] = $total;
                        ?>
                        <li id="subtotal">Subtotal<span>£<?php echo number_format($subtotalPrice, 2);?></span></li>
                        <li id="tax">Tax<span>£<?php echo number_format($tax, 2);?></span></li>
                        <li id="shipping">Shipping<span>£<?php echo number_format($shipping, 2);?></span></li>
                        <li id="shopcarttotalprice" class="shopcarttotalprice" style="font-weight: bold;"><span>£<?php echo number_format($total, 2);?></span></li>
                    </ul>
                </div>
                <div class="shopcartcheckout">
                    <button type="button" onclick="location.href = 'checkout.php?UserID=<?php echo $user_id;?>'">Check Out</button>
                </div>
            </div>
        </div>
    </div>

    <div class="newSeason">
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/4753986/pexels-photo-4753986.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                 alt="" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">WINTER NEW ARRIVALS</h3>
            <h1 class="nsTitle">New Season</h1>
            <h1 class="nsTitle">New Collection</h1>
            <a href="#nav">
                <button class="nsButton">CHOOSE YOUR STYLE</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                 alt="" class="nsImg">
        </div>
    </div>
    <footer style="margin-top:15%;">
        <div class="footerLeft">
            <!-- About Us menu -->
            <div class="footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="fList">
                    <li class="fListItem">Company</li>
                    <li class="fListItem">Contact</li>
                    <li class="fListItem">Careers</li>
                    <li class="fListItem">Affiliates</li>
                    <li class="fListItem">Stores</li>
                </ul>
            </div>
            <!-- Useful Links menu -->
            <div class="footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="fList">
                    <li class="fListItem">Support</li>
                    <li class="fListItem">Refund</li>
                    <li class="fListItem">FAQ</li>
                    <li class="fListItem">Feedback</li>
                    <li class="fListItem">Stories</li>
                </ul>
            </div>
            <!-- Products menu -->
            <div class="footerMenu">
                <h1 class="fMenuTitle">Products</h1>
                <ul class="fList">
                    <li class="fListItem">Air Force</li>
                    <li class="fListItem">Air Jordan</li>
                    <li class="fListItem">Blazer</li>
                    <li class="fListItem">Dunk low</li>
                    <li class="fListItem">Yeezy 350</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
            <!-- Newsletter subscription form -->
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@email.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <!-- Social media icons -->
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Follow Us</h1>
                <div class="fIcons">
                    <img src="./img/facebook.png" href="" alt="" class="fIcon">
                    <img src="./img/twitter.png" href="" alt="" class="fIcon">
                    <img src="./img/instagram.png" href="" alt="" class="fIcon">
                    <img src="./img/whatsapp.png" href="" alt="" class="fIcon">
                </div>
            </div>
            <!-- Copyright notice -->
            <div class="footerRightMenu">
                <span class="copyright">@Joel Biju (Candidate no:9044) All rights reserved. 2022/2023.</span>
            </div>
        </div>
    </footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--test script with list of suggestions-->
<script>
$(document).ready(function() {
  $('.quantity').change(function() {
    var productId = $(this).data('product-id');
    var quantity = $(this).val();
    $.ajax({
      url: 'update_quantity.php',
      method: 'POST',
      data: {
        productId: productId,
        quantity: quantity
      },
      success: function(response) {
        // Refresh the page
        location.reload();
      }
    });
  });
});
</script>
<script>
    const checkoutcartdiv = document.getElementById("checkoutcartdiv");
    numberofrows = document.getElementById("cart").getElementsByTagName("LI").length
    console.log(numberofrows);

    //grab the css for checkoutcont
    //assume each row is around 280px so yh. 
    let newheight = 575 + (numberofrows*280)
    let convertednewheight = newheight.toString();
    checkoutcartdiv.style.height = convertednewheight + "px";

    //making the count part work!
    const counter = document.getElementById('cartcounter');

</script>
<script type="text/javascript" src="js/code.js"></script>
<script src="js/script.js"></script>