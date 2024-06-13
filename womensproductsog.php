<?php
    require_once 'connect.php'; //establishing database connection 
    $sql = "SELECT * FROM product WHERE ProductCategory='Womens clothes'";
    $all_womensproducts = mysqli_query($conn, $sql);

?>
<?php
    include_once 'header.php';
?>
<!-- add stuff!!-->
<div class="products" style="margin-top:11%">
    <div class="productcontainer">
        <h1 class="lg-title">Women's clothing</h1>
        <p class="text-light">View all Women's clothes supplied by the Sneaker Syndicate.</p>
        <div class="product-items">         
            <!-- single product -->
            <?php
                while($row = mysqli_fetch_assoc($all_womensproducts)){
            ?>
            <div class="product">
                <div class="product-content" id="<?php echo $row["ProductBrand"]?>" style="background: url('<?php echo $row["ImgLink"];?>1.jpg');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                    <div class="product-img">
                    </div>
                    <div class="product-btns">
                        <button type="button" class="btn-cart">
                            <a href="womensproductpage.php?ProductID=<?php echo $row['ProductID']?>" style="color:#fff;">view item</a>
                            <span><i class="fa fa-tshirt"></i></span>
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title"><?php echo $row["ProductCategory"]?></h2>
                        <div class="rating">
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <a href="#" class="product-name" id="brandid"><?php echo $row["ProductBrand"]?> <?php echo $row["ProductName"]?>, Colour: <?php echo $row["Colourway"]?></a>
                    <p class="product-price"></p>
                    <p class="product-price">£<?php echo $row["ProductPrice"]?></p>
                </div>
            </div>
            <?php
               }
            ?>
        </div>
    </div>
</div>

<div class="product-collection">
    <div class="productcontainer">
        <div class="product-collection-wrapper">
            <!-- product col left -->
            <div class="product-col-left flex">
                <div class="product-col-content">
                    <h2 class="sm-title">men's shoes </h2>
                    <h2 class="md-title">men's collection </h2>
                    <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                    <button type="button" class="btn-dark">Shop now</button>
                </div>
            </div>

            <!-- product col right -->
            <div class="product-col-right">
                <div class="product-col-r-top flex">
                    <div class="product-col-content">
                        <h2 class="sm-title">women's dresses </h2>
                        <h2 class="md-title">women's collection </h2>
                        <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                        <button type="button" class="btn-dark">Shop now</button>
                    </div>
                </div>

                <div class="product-col-r-bottom">
                    <!-- left -->
                    <div class="flex">
                        <div class="product-col-content">
                            <h2 class="sm-title">summer sale </h2>
                            <h2 class="md-title">Extra 50% Off </h2>
                            <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                            <button type="button" class="btn-dark">Shop now</button>
                        </div>
                    </div>
                    <!-- right -->
                    <div class="flex">
                        <div class="product-col-content">
                            <h2 class="sm-title">shoes </h2>
                            <h2 class="md-title">best sellers </h2>
                            <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                            <button type="button" class="btn-dark">Shop now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end of stuff -->
<!--end blog-->
<section class="news" id="news">
    <div class="content">
        <h3>monthly news letter</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fuga sed itaque ducimus maxime facere nihil expedita non sunt? Nostrum, voluptatem?
        </p>
        <form action="">
            <input type="email" placeholder="please enter your email" class="email">
            <input type="submit" value="save" class="btn">
        </form>
    </div>
</section>
<!--end news-->
<!--footer things-->
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
<script src="js/script.js"></script>