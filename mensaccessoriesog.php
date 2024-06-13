<?php
    require_once 'connect.php';
    $sql = "SELECT * FROM product WHERE ProductCategory='Mens accessories'";
    $all_mensaccessories = mysqli_query($conn, $sql);

?>
<?php
    include_once 'header.php';
?>
<!-- This div contains all the products -->
<div class="products" style="margin-top:11%">

    <!-- This div contains a specific product -->
    <div class="productcontainer">
        
        <!-- The title for the product category -->
        <h1 class="lg-title">Men's accessories</h1>
        
        <!-- A short description for the product category -->
        <p class="text-light">View all Men's accessories supplied by the Sneaker Syndicate.</p>

        <!-- This div contains all the product items -->
        <div class="product-items">         
            <!-- Loop through all the kid accessories from the database and display them -->
            <?php
                while($row = mysqli_fetch_assoc($all_kidaccessories)){
             ?>
            <div class="product">
                
                <!-- The main image for the product -->
                <div class="product-content" id="<?php echo $row["ProductBrand"]?>" style="background: url('<?php echo $row["ImgLink"];?>1.jpg');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                    <div class="product-img">
                        
                    </div>

                    <!-- A button to view more details about the product -->
                    <div class="product-btns">
                        <button type="button" class="btn-cart">
                            <a href="kidsaccessoriesproductpage.php?ProductID=<?php echo $row['ProductID']?>" style="color:#fff;">view item</a>
                            <span><i class="fa fa-tshirt"></i></span>
                        </button>
                    </div>
                </div>

                <!-- Product information such as brand, name, and price -->
                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title"><?php echo $row["ProductCategory"]?></h2>

                        <!-- Rating for the product -->
                        <div class="rating">
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                        </div>
                    </div>

                    <!-- The name and brand of the product, as well as the colorway -->
                    <a href="#" class="product-name" id="brandid"><?php echo $row["ProductBrand"]?> <?php echo $row["ProductName"]?>, Colour: <?php echo $row["Colourway"]?></a>

                    <!-- The price of the product -->
                    <p class="product-price"></p>
                    <p class="product-price">£<?php echo $row["ProductPrice"]?></p>
                </div>

                <!-- An input field to store the product ID -->
                <input type="hidden" name="productID" value="<?php echo $row["ProductID"]?>">
            </div>
            <?php
               }
            ?>
        </div>
    </div>
</div>

<!-- Product collage section-->
<div class="product-collection">
    <div class="productcontainer">
        <div class="product-collection-wrapper">
            <!-- product col left -->
            <div class="product-col-left flex">
                <div class="product-col-content">
                    <h2 class="sm-title">men's shoes </h2>
                    <h2 class="md-title">men's collection </h2>
                    <p class="text-light">Find the perfect pair of men's shoes to complete your look.</p>
                    <button type="button" class="btn-dark" onclick="location.href='mensproductsog.php';">Shop now</button>
                </div>
            </div>

            <!-- product col right -->
            <div class="product-col-right">
                <div class="product-col-r-top flex">
                    <div class="product-col-content">
                        <h2 class="sm-title">women's dresses </h2>
                        <h2 class="md-title">women's collection </h2>
                        <p class="text-light">Discover our latest collection of women's dresses, perfect for any occasion.</p>
                        <button type="button" class="btn-dark" onclick="location.href='womensproductsog.php';">Shop now</button>
                    </div>
                </div>

                <div class="product-col-r-bottom">
                    <!-- left -->
                    <div class="flex">
                        <div class="product-col-content" style="background:linear-gradient(rgba(0, 0, 0, 0) rgba(0, 0, 0, 0.3)), url(' ../img/Promo/stylestuffbanner.jpg') center/cover no-repeat;">
                            <h2 class="sm-title"></h2>
                            <h2 class="md-title">Raffle </h2>
                            <p class="text-light">Enter our raffle for a chance to win exclusive prizes.</p>
                            <button type="button" class="btn-dark" onclick="location.href='raffles.php';">Shop now</button>
                        </div>
                    </div>
                    <!-- right -->
                    <div class="flex">
                        <div class="product-col-content" style="background:linear-gradient(rgba(0, 0, 0, 0) rgba(0, 0, 0, 0.3)), url(' ../img/Promo/shoepromoimage.jpg') center/cover no-repeat;">
                            <h2 class="sm-title">shoes </h2>
                            <h2 class="md-title">best sellers </h2>
                            <p class="text-light">Shop our best-selling shoes and find your new favorite pair.</p>
                            <button type="button" class="btn-dark" onclick="location.href='shoesproductsog.php';">Shop now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
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
<script type="text/javascript" src="js/code.js"></script>
<script src="js/script.js"></script>