<?php

    include_once "header.php";

?>


    <!-- about us little parte -->
    <!--thing-->
    <!--containter for product-->
    <section id="product-page" style="margin-top: 30%; ">
        <div class="raffleprodcont" style="max-width: 1500px; width: 90%; display: grid; grid-template-columns: 2fr 1fr; margin: 50px auto; box-shadow: -1px 3px 91px -30px rgb(0 0 0 / 47%);">
            <div class="raffleprodimg" style="width: 100%; background-color: #ffffff; position: relative; overflow: hidden;">
                <div class="row">
                    <div class="raffleimage-container">
                        <div class="quarterimage" style="display: grid; grid-template-columns: repeat(2, 1fr);">
                            <img src="img/raffle/shoe1/airjordan12-1.png" alt="" class="featured-image-4" style="width: 100%; padding: 20px;">
                            <img src="img/raffle/shoe1/airjordan12-2.png" alt="" class="featured-image-4" style="width: 100%; padding: 20px;">
                            <img src="img/raffle/shoe1/airjordan12-3.png" alt="" class="featured-image-4" style="width: 100%; padding: 20px;">
                            <img src="img/raffle/shoe1/airjordan12-4.png" alt="" class="featured-image-4" style="width: 100%; padding: 20px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="raffleprodconttext" style="background-color: #ffffff; padding: 60px; position: relative; ">
                <!--category-->
                <span class="indvproduct-category" style="color: #5e5e5e; font-size: 1rem;">Nike</span>
                <h3 style=" color: #252525; font-size: 4.2rem; font-weight: 600; margin: 10px 0px;">Air Jordan 12 x A Ma Maniére</h3>
                <span class="indvproduct-price" style=" font-size: 2rem; color: #252525; font-weight: 500;">£204.95</span>
                <p style="margin: 30px 0px; color: #5e5e5e; letter-spacing: 1px; font-size: 1.2rem; ">
                    Once again partnering with James Whitner's A Ma Maniére, Jordan Brand brings you an AJ12 that's all about looking fresh. The crisp upper dons splashes of Burgundy Crush pigskin leather to bring the prestige, while branded metal eyelets and refreshed backtabs add cachet to every step. The special edition hangtag is your sign-off: you've officially arrived

                </p>
                <!--size-->
                <div class="raffleprod-size-container">
                    <strong style="color: #252525; font-size: 1rem; font-weight: 600; letter-spacing: 2px; border-bottom: 1px solid #252525;">Select Size:-</strong>
                    <div class="raffleproproduct-size" style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; margin-top: 20px;">
                        <!--xl-->
                        <input type="checkbox" class="s-checkbox" style="display: none;" id="s-xl">
                        <label for="s-xl" class="s-label" style="font-size: 1.1rem; background-color: #f7f7f7; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; user-select: none; margin-right: 10px; font-weight: 500; cursor: pointer;">XL</label>
                        <!--Small-->
                        <input type="checkbox" class="s-checkbox" style="display: none;" id="s-s">
                        <label for="s-s" class="s-label" style="font-size: 1.1rem; background-color: #f7f7f7; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; user-select: none; margin-right: 10px; font-weight: 500; cursor: pointer;">S</label>
                        <!--Medium-->
                        <input type="checkbox" class="s-checkbox" style="display: none;" id="s-m">
                        <label for="s-m" class="s-label" style="font-size: 1.1rem; background-color: #f7f7f7; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; user-select: none; margin-right: 10px; font-weight: 500; cursor: pointer;">M</label>
                        <!--Large-->
                        <input type="checkbox" class="s-checkbox" style="display: none;" id="s-l">
                        <label for="s-l" class="s-label" style="font-size: 1.1rem; background-color: #f7f7f7; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; user-select: none; margin-right: 10px; font-weight: 500; cursor: pointer;">L</label>
                    </div>
                </div>
                <!--btn-->
                <div class="raffleproproduct-button" style="margin: 30px 0px; margin-bottom: 20px; grid-gap: 20px; display: grid; grid-template-columns: 1fr 1fr;">
                    <a href="https://www.nike.com/gb/launch?s=upcoming" class="add-bag-btn" style="background-color: #181818; color: #ffffff; width: 100%; height: 45px; display: flex; justify-content: center; align-items: center; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px; font-size: 0.9rem; border-radius: 4px;">Enter</a>
                </div>
                <!--help-btn-->
                <a href="#" class="help-btn">Need Any Help?</a>
            </div>
        </div>

        <!-- login / register-->

        <div class="mlbox">
            <div class="tabs">
                <h2 onclick="prodinforeveal()">Product information</h2>
                <h2 onclick="deliveryreveal()">Delivery</h2>
                <h2 onclick="returnsreveal()">Returns</h2>
                <h2 onclick="reviewsreveal()">Reviews</h2>
            </div>
            <div id="prodinfo-ml" class="mlbox-content">
                <div class="prodinfo">
                    <h3>Product Description</h3>
                    <p style="padding: 5px 0px 5px 0px;">Since his game-winning shot that brought championship glory to North Carolina, Michael Jordan has been at the forefront of basketball consciousness. He took to the court in 1985 wearing the original Air Jordan I, simultaneously breaking league rules and his opponents' will, while capturing the imaginations of fans worldwide.</p>
                    <span>
                        <p style="padding: 5px 0px 5px 0px;"><b>Fabric:</b> This product is 80% Cotton and 20% Polyester.</p>
                        <p style="padding: 5px 0px 5px 0px;"><b>Product Care:</b> Machine wash 30C. Do not tumble dry.</p>
                    </span>
                </div>
            </div>
            <div id="del-ml" class="mlbox-content">
                <h3 style="margin-top: 2%; margin-bottom: 2%; margin-left: 50px; font-size: 20px; font-weight: 500; color: #222;">Delivery Information</h3>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Do we do Contactless Delivery?
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Our couriers will leave your parcel in a safe place or your driver will knock and stand at least two steps away.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            What are some other delivery methods that we support?
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                <ul style="padding-left: 1rem;">
                                    <li>Standard UK Delivery - £3.99</li>
                                    <li>Next Day Delivery - £5.99</li>
                                    <li>FA UN-LTD Priority Delivery - £9.99</li>
                                    <li>Delivery to Store</li>
                                    <li>ParcelShop Delivery - £2.95</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Next Day Evening Delivery
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Temporarily Unavailable
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ret-ml" class="mlbox-content">
                <h3 style="margin-top: 2%; margin-bottom: 2%; margin-left: 50px; font-size: 20px; font-weight: 500; color: #222;">Return Information</h3>
                <center>
                    <div class="returns-container">
                        <div class="return-item">
                            <div class="return-section1">
                                <h4>Free UK Returns</h4>
                                <p>Return your order without leaving your house or return to one of our partner stores.</p>
                                <div class="returnslogos">
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Inpost.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Evri.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_CollectPlus.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Asda.svg" />
                                </div>
                                <a href="#" class="btn">Contact for return</a>
                            </div>
                        </div>
                        <div class="return-item">
                            <div class="return-section2">
                                <h4>Returns to Store</h4>
                                <p>You can return your order to any Footasylum store for an exchange or refund. <a href="#" style="font-weight: 400; text-decoration: underline;">Find your local store.</a></p>
                            </div>
                        </div>
                        <div class="return-item">
                            <div class="return-section3">
                                <h4>International Returns</h4>
                                <p>You will be responsible for the cost of returning the item(s) to us. Follow the instructions detailed <a href="#" style="font-weight: 400; text-decoration: underline;">here.</a></p>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
            <div id="rev-ml" class="mlbox-content">
                <h3 style="margin-top: 2%; margin-bottom: 2%; margin-left: 50px; font-size: 20px; font-weight: 500; color: #222;">Reviews</h3>
                <div class="reviews-box-container">
                    <div class="review-box">
                        <div class="review-top">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="img/promo/user.png" />
                                </div>
                                <div class="name-user">
                                    <strong>Random user 1</strong>
                                    <span>@RandomUser1</span>
                                </div>
                            </div>
                            <div class="reviewcontent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>This website is amazing! Yhyhyh</p>
                    </div>
                    <div class="review-box">
                        <div class="review-top">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="img/promo/user.png" />
                                </div>
                                <div class="name-user">
                                    <strong>Random user 1</strong>
                                    <span>@RandomUser1</span>
                                </div>
                            </div>
                            <div class="reviewcontent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>This website is amazing! Yhyhyh</p>
                    </div>
                    <div class="review-box">
                        <div class="review-top">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="img/promo/user.png" />
                                </div>
                                <div class="name-user">
                                    <strong>Random user 1</strong>
                                    <span>@RandomUser1</span>
                                </div>
                            </div>
                            <div class="reviewcontent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>This website is amazing! Yhyhyh</p>
                    </div>
                    <div class="review-box">
                        <div class="review-top">
                            <div class="profile">
                                <div class="profile-img">
                                    <img src="img/promo/user.png" />
                                </div>
                                <div class="name-user">
                                    <strong>Random user 1</strong>
                                    <span>@RandomUser1</span>
                                </div>
                            </div>
                            <div class="reviewcontent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>This website is amazing! Yhyhyh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- add stuff!!-->
    <!--end blog-->
    <!--end news-->
    <!--footer things-->
    <footer>
        <div class="footerLeft">
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
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@email.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Follow Us</h1>
                <div class="fIcons">
                    <img src="./img/facebook.png" href="" alt="" class="fIcon">
                    <img src="./img/twitter.png" href="" alt="" class="fIcon">
                    <img src="./img/instagram.png" href="" alt="" class="fIcon">
                    <img src="./img/whatsapp.png" href="" alt="" class="fIcon">
                </div>
            </div>
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