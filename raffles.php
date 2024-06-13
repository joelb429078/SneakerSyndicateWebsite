<?php

    include_once "header.php";

?>

<div class="products">
    <div class="productcontainer">
        <!-- Raffle Title and Description -->
        <h1 class="lg-title" style="margin-top:205px;">Raffle</h1>
        <p class="text-light">Whether your feeling lucky or down on your luck, try enter our weekly raffles and see if you could given the opportunity to get some limited run shoes from brands such as adidas, nike and many more.</p>
        
        <!-- Raffle Banner Image -->
        <div class="rafflebanner">
            <img src="img/Promo/rafflebanner.jpg" />
        </div>
        
        <!-- Raffle Items -->
        <div class="product-items" style="margin-bottom: 3%; margin-top: 10%; ">
            <!-- Single Raffle Item -->
            <div class="raffle">
                <!-- Raffle Item Image -->
                <div class="raffle-content">
                    <div class="product-img" style="background: url('img/raffle/shoe1/airjordan12-1.png');background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                    <!-- Button to Enter Raffle Item -->
                    <div class="raffle-btns">
                        <button type="button" class="btn-enternow" onclick="window.location.href='rafflesindividualpage1.php'">
                            Enter now
                        </button>
                    </div>
                </div>
                
                <!-- Raffle Item Info -->
                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title">lifestyle</h2>
                    </div>
                    <a href="rafflesindividualpage1.php" class="product-name">Nike Air Jordan 12 X A Ma Maniére</a>
                </div>
                
                <!-- Time Remaining for Raffle Item -->
                <div class="raffletime">
                    <h2 class="raffletitle">2 Days left</h2>
                </div>
            </div>
            <!-- End of Single Raffle Item -->
            <!-- Repeat this structure for all Raffle Items -->
            <div class="raffle">
                <div class="raffle-content">
                    <div class="product-img"style="background: url('img/raffle/shoe2/airjordan2-1.png');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                    </div>
                    <div class="raffle-btns">
                        <button type="button" class="btn-enternow" onclick="window.location.href='rafflesindividualpage2.php'"> <!-- link to raffle item page-->
                            Enter now <!-- enter now button -->
                        </button>
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title">lifestyle</h2>
                    </div>
                    <a href="rafflesindividualpage2.php" class="product-name">Nike Air Jordan 2 - Pine Green</a> <!-- item name-->
                </div>

                <div class="raffletime">
                    <h2 class="raffletitle">4 Days left</h2> <!-- header section with the days left to enter -->
                </div>
            </div>

            <div class="raffle">
                <div class="raffle-content">
                    <div class="product-img" style="background: url('img/raffle/shoe3/airforce1-1.png');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                    </div>
                    <div class="raffle-btns">
                        <button type="button" class="btn-enternow" onclick="window.location.href='rafflesindividualpage3.php'"> <!-- link to raffle item page-->
                            Enter now <!-- enter now button -->
                        </button>
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title">lifestyle</h2> 
                    </div>
                    <a href="rafflesindividualpage3.php" class="product-name">Nike Air Force one - Cocoa Brown</a> <!-- item name-->
                </div>

                <div class="raffletime">
                    <h2 class="raffletitle">5 Days left</h2> <!-- header section with the days left to enter -->
                </div>
            </div>

            <div class="raffle">
                <div class="raffle-content">
                    <div class="product-img" style="background: url('img/raffle/shoe4/airjordan5-1.png');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                    </div>
                    <div class="raffle-btns">
                        <button type="button" class="btn-enternow" onclick="window.location.href='rafflesindividualpage4.php'"> <!-- link to raffle item page-->
                            Enter now <!-- enter now button -->
                        </button>
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-info-top">
                        <h2 class="sm-title">lifestyle</h2>
                    </div>
                    <a href="rafflesindividualpage4.php" class="product-name">Nike Air Jordan 5 - Blue Aqua</a> <!-- item name-->
                </div>

                <div class="raffletime">
                    <h2 class="raffletitle">6 Days left</h2> <!-- header section with the days left to enter -->
                </div>
            </div>
        </div>
        <!-- Raffle FAQ Section -->
        <div class="rafflefaq">
            <h1>
                NIKE SNKRS X SNEAKER SYNDICATE DRAW RULES <!-- header -->
            </h1>
            <h5>Rules?</h5>
            <ul>
                <!-- all rules -->
                <li>A Nike Member profile or as a Snkear Syndicate Member, a valid email address and verified mobile phone number are required.</li>
                <li>One entry per person per launch product.</li>
                <li>We reserve the right to cancel winning entries.</li>
                <li>Once submitted, entries cannot be modified.</li>
                <li>Winning entries are valid only for the consumer information, product and size. Winning entries are valid only during the specified timeframe on the launch date.</li>
                <li>You'll get free delivery on all winning orders and free 30-day returns.</li>
                <li>Entries are not transferable.</li>
                <li>The drawing process is subject to change at any time at sole discretion from either organisation.</li>
            </ul>
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