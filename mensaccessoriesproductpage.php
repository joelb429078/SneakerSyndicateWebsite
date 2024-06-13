<?php
require_once'connect.php';

if(isset($_GET{'ProductID'})){
    
    $ProductID = mysqli_real_escape_string($conn, $_GET['ProductID']);

    $SQL="SELECT * FROM product WHERE ProductID='$ProductID'";
    $result = mysqli_query($conn, $SQL) or die("Bad Query: $SQL");
    $row = mysqli_fetch_array($result);

}else{
    header('Location: mensaccessoriesog.php');
}

?>
<?php
    include_once 'header.php';
?>
        <!--Mens accessories page -->
        <div class="indvproduct-details" style="margin-top: 15%;">
            <!--**Img*************************-->
            <div class="indvproduct-img">
                <!-- Swiper Slider -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!--**1******-->
                        <div class="swiper-slide">
                            <img src="<?php echo $row["ImgLink"];?>1.jpg" />
                        </div>
                        <!--**2******-->
                        <div class="swiper-slide">
                            <img src="<?php echo $row["ImgLink"];?>2.jpg" />
                        </div>
                        <!--**3******-->
                        <div class="swiper-slide">
                            <img src="<?php echo $row["ImgLink"];?>3.jpg" />
                        </div>
                        <!--**4******-->
                        <div class="swiper-slide">
                            <img src="<?php echo $row["ImgLink"];?>4.jpg" />
                        </div>
                    </div>
                    <!--btns-->
                    <div class="slider-btns">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <!--**Text************************-->
            <div class="indvproduct-text">
                <!--category-->
                <span class="indvproduct-category">Colourway: <?php echo $row["Colourway"];?> </span>
                <h3><?php echo $row["ProductBrand"];?> <?php echo $row["ProductName"];?></h3>
                <span class="indvproduct-price">£<?php echo $row["ProductPrice"];?></span>
                <p>
                    This is <?php echo $row["ProductBrand"];?> <?php echo $row["ProductName"];?> comes in a <?php echo $row["Colourway"];?> colourway.
                    <br />
                    The latest of new releases from <?php echo $row["ProductBrand"];?> and comes at a reasonable price. An amazing item worth buying!
                </p>
                <!--size-->
                <form method="post" action="cartaddprocess.php?ProductID=<?php echo $row['ProductID']?>">
                    <div class="indvproduct-size-container">
                        <strong>Select Size:-</strong>
                        <div class="indvproduct-size" method="post">
                            <!--xl-->
                            <input type="radio" class="s-checkbox" id="s-xl" value="XL" name="size" style="opacity:0;">
                            <label for="s-xl" class="s-label">XL</label>
                            <!--Small-->
                            <input type="radio" class="s-checkbox" id="s-l" value="L" name="size" style="opacity:0;">
                            <label for="s-l" class="s-label">L</label>
                            <!--Medium-->
                            <input type="radio" class="s-checkbox" id="s-m" value="M" name="size" style="opacity:0;">
                            <label for="s-m" class="s-label">M</label>
                            <!--Large-->
                            <input type="radio" class="s-checkbox" id="s-s" value="S" name="size" style="opacity:0;">
                            <label for="s-s" class="s-label">s</label>
                        </div>
                    </div>
                    <!--btn-->
                    <div class="indvproduct-button">
                            <button name="cartaddbtn" type="submit" class="add-bag-btn">Add To Bag</button>
                    </div>
                </form>
                <!--help-btn-->
                <a href="contact.php" class="help-btn">Need Any Help?</a>
            </div>
        </div>
        <!-- Multitextbox-->
        <div class="mlbox">
            <!-- Create a div element with class "tabs" -->
            <div class="tabs">
                <!-- Create four h2 elements for each tab, with an onclick attribute that triggers a function to reveal the corresponding content -->
                <h2 onclick="prodinforeveal()">Product information</h2>
                <h2 onclick="deliveryreveal()">Delivery</h2>
                <h2 onclick="returnsreveal()">Returns</h2>
                <h2 onclick="reviewsreveal()">Reviews</h2>
            </div>
            <!-- Create a div element with an id "prodinfo-ml" and class "mlbox-content" -->
            <div id="prodinfo-ml" class="mlbox-content">
                <!-- Create a div element with class "prodinfo" -->
                <div class="prodinfo">
                    <!-- Create an h3 element for the product description -->
                    <h3>Product Description</h3>
                    <!-- Create a p element to display the product description with padding -->
                    <p style="padding: 5px 0px 5px 0px;"><?php echo $row["Description"];?></p>
                    <!-- Create a span element to group related paragraphs -->
                    <span>
                        <!-- Create two p elements to display additional product information with padding -->
                        <p style="padding: 5px 0px 5px 0px;"><b>Fabric:</b> This product is 80% Cotton and 20% Polyester.</p>
                        <p style="padding: 5px 0px 5px 0px;"><b>Product Care:</b> Machine wash 30C. Do not tumble dry.</p>
                    </span>
                </div>
            </div>
            <!-- Create a div element with an id "del-ml" and class "mlbox-content" -->
            <div id="del-ml" class="mlbox-content">
                <!-- Create an h3 element for the delivery information -->
                <h3 style="margin-top: 2%; margin-bottom: 2%; margin-left: 50px; font-size: 20px; font-weight: 500; color: #222;">Delivery Information</h3>
                <!-- Create a div element with class "accordion" to display the delivery information in an accordion style -->
                <div class="accordion">
                    <!-- Create three accordion items with headers and bodies -->
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
            <!-- A container for the return information -->
            <div id="ret-ml" class="mlbox-content">
                <!-- Heading for the return information -->
                <h3 style="margin-top: 2%; margin-bottom: 2%; margin-left: 50px; font-size: 20px; font-weight: 500; color: #222;">Return Information</h3>
                <!-- Center align the following content -->
                <center>
                    <!-- A container for the return options -->
                    <div class="returns-container">
                        <!-- First return option with an image and a link -->
                        <div class="return-item">
                            <div class="return-section1">
                                <h4>Free UK Returns</h4>
                                <p>Return your order without leaving your house or return to one of our partner stores.</p>
                                <!-- Logos of the partner stores -->
                                <div class="returnslogos">
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Inpost.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Evri.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_CollectPlus.svg" />
                                    <img src="https://support.footasylum.co.uk/footasylum/deployments/fa-pdp-optimised/prod/dist/assets/imgs/Zig_Asda.svg" />
                                </div>
                                <!-- A button to contact for return -->
                                <a href="#" class="btn">Contact for return</a>
                            </div>
                        </div>
                        <!-- Second return option with a link -->
                        <div class="return-item">
                            <div class="return-section2">
                                <h4>Returns to Store</h4>
                                <p>You can return your order to any Footasylum store for an exchange or refund. <a href="#" style="font-weight: 400; text-decoration: underline;">Find your local store.</a></p>
                            </div>
                        </div>
                        <!-- Third return option with a link -->
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
                <!-- A container for reviews -->
                <div class="reviews-box-container">
                    <!-- A review box -->
                    <div class="review-box">
                        <div class="review-top">
                            <!-- User profile -->
                            <div class="profile">
                                <!-- User profile image -->
                                <div class="profile-img">
                                    <img src="img/promo/user.png" />
                                </div>
                                <!-- User name and handle -->
                                <div class="name-user">
                                    <strong>Random user 1</strong>
                                    <span>@RandomUser1</span>
                                </div>
                            </div>
                            <!-- Review star rating -->
                            <div class="reviewcontent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <!-- Review text -->
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
    <!--==Jquery===========================-->
    <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        // get elements by ID
        var prodinfopart = document.getElementById("prodinfo-ml");
        var deliverypart = document.getElementById("del-ml");
        var returnpart = document.getElementById("ret-ml");
        var reviewpart = document.getElementById("rev-ml");
        var prodinfoheader = document.getElementById("piheader");
        var deliveryheader = document.getElementById("deheader");
        var returnheader = document.getElementById("rtheader");
        var reviewheader = document.getElementById("rvheader");

        // function to reveal product info section
        function prodinforeveal() {
            prodinfopart.style.left = "20px";
            deliverypart.style.left = "1020px";
            returnpart.style.left = "2020px";
            reviewpart.style.left = "3020px";
        }

        // function to reveal delivery section
        function deliveryreveal() {
            prodinfopart.style.left = "-1020px";
            deliverypart.style.left = "20px";
            returnpart.style.left = "1020px";
            reviewpart.style.left = "2020px";
        }

        // function to reveal returns section
        function returnsreveal() {
            prodinfopart.style.left = "-2020px";
            deliverypart.style.left = "-1020px";
            returnpart.style.left = "20px";
            reviewpart.style.left = "1020px";
        }

        // function to reveal reviews section
        function reviewsreveal() {
            prodinfopart.style.left = "-3020px";
            deliverypart.style.left = "-2020px";
            returnpart.style.left = "-1020px";
            reviewpart.style.left = "20px";
        }

        // initialize Swiper
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                450: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                820: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
            },
        });

        // function to uncheck other checkboxes when one is checked
        $('.s-checkbox').on('change', function () {
            $('.s-checkbox').not(this).prop('checked', false);
        });
    </script>

    <!-- accordion script -->
    <script>
        // get accordion item headers
        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        // loop through headers and add event listener
        accordionItemHeaders.forEach(accordionItemHeader => {
            accordionItemHeader.addEventListener("click", event => {
                // toggle active class
                accordionItemHeader.classList.toggle("active");
                // get accordion item body
                const accordionItemBody = accordionItemHeader.nextElementSibling;
                // adjust max-height of body based on active class
                if (accordionItemHeader.classList.contains("active")) {
                    accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
                }
                else {
                    accordionItemBody.style.maxHeight = 0;
                }
            });
        });
    </script>
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