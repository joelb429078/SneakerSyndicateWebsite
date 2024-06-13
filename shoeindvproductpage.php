<?php
require_once'connect.php';

if(isset($_GET{'ProductID'})){
    
    $ProductID = mysqli_real_escape_string($conn, $_GET['ProductID']);

    $SQL="SELECT * FROM product WHERE ProductID='$ProductID'";
    $result = mysqli_query($conn, $SQL) or die("Bad Query: $SQL");
    $row = mysqli_fetch_array($result);

}else{
    header('Location: shoesproductog.php');
}

?>
<?php
    include_once 'header.php';
?>
        <!-- shoe stuff-->
        <div class="indvproduct-details" style="margin-top: 15%;">
            <!-- shoe image -->
            <div class="indvproduct-img">
                <div class="row" style=" border: none; border-radius: 0rem; background: none;">
                    <div class="image-container">
                        <div class="small-image">
                            <img src="<?php echo $row["ImgLink"];?>1.jpg" alt="" class="featured-image-1">
                            <img src="<?php echo $row["ImgLink"];?>2.jpg" alt="" class="featured-image-1">
                            <img src="<?php echo $row["ImgLink"];?>3.jpg" alt="" class="featured-image-1">
                            <img src="<?php echo $row["ImgLink"];?>4.jpg" alt="" class="featured-image-1">
                        </div>
                        <div class="big-image">
                            <img src="img/shoes/<?php echo $row["ProductBrand"];?>/<?php echo $row["ProductName"];?>/<?php echo $row["Colourway"];?>/<?php echo $row["Colourway"];?>1.jpg" alt="" class="big-image-1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="indvproduct-text">

                <span class="indvproduct-category">Colourway: <?php echo $row["Colourway"];?></span>
                <h3><?php echo $row["ProductBrand"];?> <?php echo $row["ProductName"];?></h3>
                <span class="indvproduct-price">£<?php echo $row["ProductPrice"];?></span>
                <p>
                    This is <?php echo $row["ProductBrand"];?> <?php echo $row["ProductName"];?> comes in a <?php echo $row["Colourway"];?> colourway.
                    <br />
                    The latest of new releases from <?php echo $row["ProductBrand"];?> and comes at a reasonable price. An amazing item worth buying!
                </p>


                <form method="post" action="cartaddprocess.php?ProductID=<?php echo $row['ProductID']?>">
                    <div class="indvproduct-size-container">
                        <strong>Select Size:-</strong>
                        <div class="indvproduct-size" method="post">
                            <input type="radio" class="s-checkbox" id="s" value="" name="size" style="opacity:0;">
                            <label for="s" class="s-label" style="opacity:0;"></label>
                            <input type="radio" class="s-checkbox" id="s-" value="" name="size" style="opacity:0;">
                            <label for="s-" class="s-label" style="opacity:0;"></label>
                            <input type="radio" class="s-checkbox" id="s-" value="" name="size" style="opacity:0;">
                            <label for="s-" class="s-label" style="opacity:0;"></label>
                            <input type="radio" class="s-checkbox" id="s-" value="" name="size" style="opacity:0;">
                            <label for="s-" class="s-label" style="opacity:0;"></label>
                            <input type="radio" class="s-checkbox" id="s-" value="" name="size" style="opacity:0;">
                            <label for="s-" class="s-label" style="opacity:0;"></label>
                            

                            <!-- sizes -->
                            <input type="radio" class="s-checkbox" id="s-4" value="4" name="size" style="opacity:0;">
                            <label for="s-4" class="s-label"> 4</label>
                            <!--size 5-->
                            <input type="radio" class="s-checkbox" id="s-5" value="5" name="size" style="opacity:0;">
                            <label for="s-5" class="s-label"> 5</label>
                            <!--size 6-->
                            <input type="radio" class="s-checkbox" id="s-6" value="6" name="size" style="opacity:0;">
                            <label for="s-6" class="s-label"> 6</label>
                            <!--size 7-->
                            <input type="radio" class="s-checkbox" id="s-7" value="7" name="size" style="opacity:0;">
                            <label for="s-7" class="s-label"> 7</label>
                            <!--size 8-->
                            <input type="radio" class="s-checkbox" id="s-8" value="8" name="size" style="opacity:0;">
                            <label for="s-8" class="s-label"> 8</label>
                            <!--size 9-->
                            <input type="radio" class="s-checkbox" id="s-9" value="9" name="size" style="opacity:0;">
                            <label for="s-9" class="s-label"> 9</label>
                            <!--size 10-->
                            <input type="radio" class="s-checkbox" id="s-10" value="10" name="size" style="opacity:0;">
                            <label for="s-10" class="s-label">10</label>
                            <!--size 11-->
                            <input type="radio" class="s-checkbox" id="s-11" value="11" name="size" style="opacity:0;">
                            <label for="s-11" class="s-label">11</label>
                            <!--size 12-->
                            <input type="radio" class="s-checkbox" id="s-12" value="12" name="size" style="opacity:0;">
                            <label for="s-12" class="s-label">12</label>
                            <!--size 13-->
                            <input type="radio" class="s-checkbox" id="s-13" value="13" name="size" style="opacity:0;">
                            <label for="s-13" class="s-label">13</label>
                            <!--size 14-->
                            <input type="radio" class="s-checkbox" id="s-14" value="14" name="size" style="opacity:0;">
                            <label for="s-14" class="s-label">14</label>
                        </div>
                    </div>
                    <!-- add to bag btn-->
                    <div class="indvproduct-button">
                            <button name="cartaddbtn" type="submit" class="add-bag-btn">Add To Bag</button>
                    </div>
                </form>
  
                <a href="contact.php" class="help-btn">Need Any Help?</a> <!-- -->
            </div>
        </div>


        <!-- Multithingtextbox-->
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