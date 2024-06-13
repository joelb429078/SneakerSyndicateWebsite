<?php
    include_once 'header.php';
?>
    <section class="home" id="home">
        <!-- Four slide-container divs that hold the slide content -->
        <div class="slide-container active">
            <div class="slide">
                <!-- The content div that holds the slide's text -->
                <div class="content">
                    <span>Nike</span>
                    <h3>Nike Air max 95</h3>
                    <p>
                        Nike Air Max 95 Essential Trainers in Triple Black. Lightweight cushioning with a streamlined aesthetic points towards an unparalleled comfortable ride.
                    </p>
                    <!-- The "view item" button that links to a specific product page -->
                    <a href="shoeindvproductpage.php?ProductID=197" class="addbtn">view item</a>
                </div>
                <!-- The image div that holds the slide's shoe image -->
                <div class="image">
                    <img src="img\shoes\Nike\air max 95\black\blackside.png" class="shoe">
                </div>
                <!-- The background div that adds a background color overlay to the slide's image -->
                <div class="image-bg"></div>
            </div>
        </div>
        <!-- Three additional slide-container divs with similar structure -->
        <div class="slide-container">
            <div class="slide">
                <!-- Content, image, and background divs for the second slide -->
            </div>
        </div>
        <div class="slide-container">
            <div class="slide">
                <!-- Content, image, and background divs for the third slide -->
            </div>
        </div>
        <div class="slide-container">
            <div class="slide">
                <!-- Content, image, and background divs for the fourth slide -->
            </div>
        </div>

        <!-- Navigation arrows to move between slides -->
        <div id="prev" class="fa fa-angle-left" onclick="prev();"></div>
        <div id="next" class="fa fa-angle-right" onclick="next();"></div>
    </section>

    <!-- Features section beneath the Slider section -->
    <div class="features">
        <!-- Free shipping feature -->
        <div class="feature">
            <img src="./img/shipping.png" alt="" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <!-- 30-day return feature -->
        <div class="feature">
            <img class="featureIcon" src="./img/return.png" alt="">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <!-- Gift cards feature -->
        <div class="feature">
            <img class="featureIcon" src="./img/gift.png" alt="">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <!-- Contact us feature -->
        <div class="feature">
            <img class="featureIcon" src="./img/contact.png" alt="">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>
    </div>
    <!-- Heading and subheading of poster section -->
    <center><h2 style="font-size:35px;background:#37db93;color:#fff;border-radius: 10%; width:20%; height:5%;margin-top:20px;">Stay in style!</h2></center>
    <center><h4 style="font-size: 15px;font-style:italic;">Whenever, wherever! </h4></center>
    <!-- Banner section -->
    <center>
        <div class="banner-container">
            <!-- Banner image -->
            <div class="banner">
                <img src="img\Promo\newrotation-nig.jpg" />
            </div>
        </div>
    </center>

    <center>
        <!-- Section for the homepage text -->
        <div class="hometext">
            <!-- Background image for the section -->
            <div class="img-background">
                <img src="img/Promo/description.png" />
            </div>
            <!-- Box containing the text and other elements -->
            <div class="hometextbox">
                <!-- Heading for the section -->
                <h2 style="font-size: 60px; font-weight:bold; color: #000000;">Welcome </h2>
                <!-- Paragraph introducing the website -->
                <p style="padding-top: 15px;"><b style="color: #00fb71; font-weight: 800; font-size: 16px; background: -webkit-linear-gradient(#80d776, #1acdeb); -webkit-background-clip: text; -webkit-text-fill-color: transparent; ">Welcome to the Sneaker Syndicate, </b> the only place you need to expand upon your wardrobe, to cop some new drip or even to add some extra flair to your outfits.</p>
                <!-- Paragraph highlighting the three main features of the website -->
                <p style="padding-top: 15px;">We want to give you the best e-commerce experience and so to do that we have 3 maint things we will offer: </p>
                <!-- First feature with an icon and text -->
                <div class="homelistitem">
                    <div class="fa-sharp fa-solid fa-badge-check"></div>
                    <p><b>Guranteed Authenticity</b> - We legit check every item we sell</p>
                </div>
                <!-- Second feature with an icon and text -->
                <div class="homelistitem">
                    <div class="fa-sharp fa-solid fa-badge-check"></div>
                    <p><b>Instant Transactions</b> - We will process orders immediately</p>
                </div>
                <!-- Third feature with an icon and text -->
                <div class="homelistitem">
                    <div class="fa-sharp fa-solid fa-badge-check"></div>
                    <p><b>Quality Service</b> - We pride ourselves on our service.</p>
                </div>
                <!-- Paragraph introducing the variety of products -->
                <p style="padding-top: 15px;">We also guarantee that we have something for everyone, we have it all! If you are new, returning or a veteran of the syndicate we have something for everyone. Come, lets explore!</p>
                <!-- Button for shopping -->
                <button class="shopnowbtn">
                    Shop now!
                </button>
            </div>
        </div>
    </center>

    <center>
        <!-- draggable carousel section-->
        <div class="wrapper">
            <!-- interactive buttons for showing next and previous items -->
            <button class="arrow prev"><i class="fas fa-chevron-left"></i></button>
            <button class="arrow next"><i class="fas fa-chevron-right"></i></button>
            <div class="card-wrapper">
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK51_Q1_Categories-1_M_Activewear-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Activewear</a>
                        <p class="card-description">Comfortable and stylish athletic wear for any workout.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK51_Q1_Categories-1_M_Footwear-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Footwear</a>
                        <p class="card-description">Shoes for any occasion, from sneakers to sliders.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK05_Q1_Pt2_Mens_categories_Joggers-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Cargos</a>
                        <p class="card-description">Functional and fashionable pants with multiple pockets.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK05_Q1_Pt2_Mens_categories_Hoodies-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Hoodies</a>
                        <p class="card-description">Warm and comfortable sweatshirts for everyday wear.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK05_Q1_Pt2_Mens_categories_Tracksuits-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Tracksuits</a>
                        <p class="card-description">Matching jacket and pants sets for a sleek and coordinated look.p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK05_Q1_Pt2_Mens_categories_Jackets-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Jackets</a>
                        <p class="card-description">Trendy and durable outerwear for any weather.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK51_Q1_Categories-1_M_Woven-Pants-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">Joggers</a>
                        <p class="card-description">Comfortable and stylish pants for lounging or working out.</p>
                    </div>
                </div>
                <div class="card-item">
                    <!-- item image and description -->
                    <img src="https://support.footasylum.co.uk/footasylum/images/FA_WK51_Q1_Categories-1_M_Tshirts-compressed.jpg" alt="" />
                    <div class="card-info">
                        <a href="#" class="card-title">T-Shirts</a>
                        <p class="card-description">Classic and versatile shirts for everyday wear.</p>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <!-- The following code creates a centered banner with a promotional message, encouraging users to shop the latest offers with up to 60% off on the biggest brands. -->
    <center>
        <div class="adbanner">
            <div class="adbanner-text">
                <h2 style=" font-size: 25px; color: #252525;">LATEST OFFERS</h2> <!-- Heading for the promotional message -->
                <h1 style=" color: #f9f9f9; font-size: 60px; font-weight: bold;">UP TO 60% OFF!</h1> <!-- Main message in bold and white text -->
                <p>Shop discounts on the biggest brands now!</p> <!-- Secondary message encouraging users to shop -->
            </div>
            <img src="img/Promo/orangetn.png" alt="Shop now!" /> <!-- Image with the text "Shop now!" -->
        </div>
    </center>
    <!-- title section for collection collage -->
    <div class="title" style="width:450px;">
        <h3 style="border-bottom: 2mm ridge rgb(55 219 147 / 0.65);  margin-left:45%;">All collections:</h3>
    </div>

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
    <!-- just landed featurette -->
    <div class="justlanded">
        <h1>Just Landed</h1>
        <h2>at the Sneaker Syndicate</h2>
    </div>
    <!-- 3 brief sections with promotional images and buttons that act as links for different items --> 
    <section class="featured" id="fearured">
        <div class="shopfor" style="margin-top: 4%; margin-bottom:4%;">
            <div class="sfbox">
                <img src="img/Promo/Mensshoes.jpg" alt="">
                <div class="content">
                    <span></span>
                    <h3>Latest Men's footwear</h3>
                    <a href="shoesproductsog.php" class="btn">Shop Men's</a>
                </div>
            </div>
            <div class="sfbox">
                <img src="img/Promo/Womensshoes.jpg" alt="">
                <div class="content">
                    <h3>Latest Women's footwear</h3>
                    <a href="shoesproductsog.php" class="btn">Shop Women's</a>
                </div>
            </div>
            <div class="sfbox">
                <img src="img/Promo/Kidsshoes.jpg" alt="">
                <div class="content">
                    <h3>Latest Kids' footwear</h3>
                    <a href="shoesproductsog.php" class="btn">Shop Kids'</a>
                </div>
            </div>
        </div>
   
        <!-- A container for the title of the section -->
        <div class="title">
            <!-- A heading for the section with a left margin of 20% -->
            <h3 style="margin-left: 20%;">Extra drip:</h3>
        </div>

        <!-- A container for a short description of the section -->
        <div class="silnm">
            <p>Style, inspiration, launches &amp; more</p>
        </div>

        <!-- A container for a group of information cards -->
        <div class="infowrapper">
            <!-- A container for the individual information cards -->
            <div class="infocard-wrapper">
                <!-- An information card containing an image and a brief description of a product -->
                <div class="infocard-item">
                    <img src="img/Promo/lacoste.jpg" alt="">
                    <div class="infocard-info">
                        <!-- A clickable title for the product -->
                        <a href="#" class="card-title">Lacoste</a>
                        <!-- A brief description of the product -->
                        <p class="infocard-description">Originally founded in the subarbs of the french riviera this company has now formed a link between fashion and lifestlye</p>
                    </div>
                </div>
                <!-- An information card containing an image and a brief description of a product -->
                <div class="infocard-item">
                    <img src="img/Promo/rltennis.jpg" alt="">
                    <div class="infocard-info">
                        <!-- A clickable title for the product -->
                        <a href="#" class="infocard-title">Ralph Lauren Tennis</a>
                        <!-- A brief description of the product -->
                        <p class="infocard-description">This summer expect to see style be on the mainstage of the Australian open as Ralph Lauren feature.</p>
                    </div>
                </div>
                <!-- An information card containing an image and a brief description of a product -->
                <div class="infocard-item">
                    <img src="img/Promo/gmc.jpg" alt="">
                    <div class="infocard-info">
                        <!-- A clickable title for the product -->
                        <a href="#" class="infocard-title">Good Energy Club</a>
                        <!-- A brief description of the product -->
                        <p class="infocard-description">Need to find that middleground between style, vibrancy and emotion then the Good energy club has you covered.</p>
                    </div>
                </div>
                <!-- An information card containing an image and a brief description of a product -->
                <div class="infocard-item">
                    <img src="img/Promo/cnike.jpg" alt="">
                    <div class="infocard-info">
                        <!-- A clickable title for the product -->
                        <a href="#" class="infocard-title">Corteiz X Nike</a>
                        <!-- A brief description of the product -->
                        <p class="infocard-description">Up and coming label Corteiz have recently collabed with sports powerhouse Nike.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="newSeason"> <!-- container for new season section -->
        <div class="nsItem"> <!-- item within the container -->
            <img src="https://images.pexels.com/photos/4753986/pexels-photo-4753986.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg"> <!-- image of the new season -->
        </div>
        <div class="nsItem"> <!-- another item within the container -->
            <h3 class="nsTitleSm">WINTER NEW ARRIVALS</h3> <!-- small title for the new arrivals section -->
            <h1 class="nsTitle">New Season</h1> <!-- large title for the new season section -->
            <h1 class="nsTitle">New Collection</h1> <!-- large title for the new collection section -->
            <a href="#nav"> <!-- anchor tag that links to the navigation section -->
                <button class="nsButton">CHOOSE YOUR STYLE</button> <!-- button that navigates to the navigation section -->
            </a>
        </div>
        <div class="nsItem"> <!-- another item within the container -->
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg"> <!-- image of the new season -->
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
<!--test script with list of suggestions-->
<script type="text/javascript" src="js/code.js"></script>
<script src="js/script.js"></script>