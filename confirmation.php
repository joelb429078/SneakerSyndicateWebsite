<?php
    include_once 'header.php';
?>

<!-- A container with a background for the checkout page -->
<div class="checkoutbackground">
    <!-- The main checkout panel with input fields for payment information -->
    <div class="checkout-panel">
        <!-- The body of the checkout panel -->
        <div class="checkoutpanel-body">
            <!-- The title of the checkout page -->
            <h2 class="checkouttitle">Checkout here!</h2>

            <!-- A progress bar to indicate the checkout process steps -->
            <div class="checkoutprogress-bar">
                <div class="checkoutstep active"></div>
                <div class="checkoutstep"></div>
                <div class="checkoutstep"></div>
                <div class="checkoutstep"></div>
            </div>

            <!-- Input fields for the payment information -->
            <div class="checkoutinput-fields">
                <!-- The first column for cardholder name, card valid date, and CVV/CVC -->
                <div class="checkoutcolumn-1">
                    <label for="cardholder">Name</label>
                    <input type="text" id="cardholder" />

                    <div class="checkoutsmall-inputs">
                        <div>
                            <label for="date">Valid date</label>
                            <input type="text" id="date" />
                        </div>

                        <div>
                            <label for="verification">CVV / CVC *</label>
                            <input type="password" id="verification" />
                        </div>
                    </div>
                </div>
                <!-- The second column for card number and information about CVV/CVC code -->
                <div class="checkoutcolumn-2">
                    <label for="cardnumber">Card Number</label>
                    <input type="password" id="cardnumber" />

                    <span class="checkoutinfo">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
                </div>
            </div>
        </div>

        <!-- The footer of the checkout panel with buttons for back and next steps -->
        <div class="checkoutpanel-footer">
            <button class="checkoutbtn checkoutback-btn">Back</button>
            <button class="checkoutbtn checkoutnext-btn">Next Step</button>
        </div>
    </div>
</div>
    <!-- A container with a background for the checkout page -->
    <div class="checkoutbackground">
        <!-- The main checkout panel with input fields for payment information -->
        <div class="checkout-panel">
            <!-- The body of the checkout panel -->
            <div class="checkoutpanel-body">
                <!-- The title of the checkout page -->
                <h2 class="checkouttitle">Checkout here!</h2>

                <!-- A progress bar to indicate the checkout process steps -->
                <div class="checkoutprogress-bar">
                    <div class="checkoutstep active"></div>
                    <div class="checkoutstep"></div>
                    <div class="checkoutstep"></div>
                    <div class="checkoutstep"></div>
                </div>

                <!-- Input fields for the payment information -->
                <div class="checkoutinput-fields">
                    <!-- The first column for cardholder name, card valid date, and CVV/CVC -->
                    <div class="checkoutcolumn-1">
                        <label for="cardholder">Name</label>
                        <input type="text" id="cardholder" />

                        <div class="checkoutsmall-inputs">
                            <div>
                                <label for="date">Valid date</label>
                                <input type="text" id="date" />
                            </div>

                            <div>
                                <label for="verification">CVV / CVC *</label>
                                <input type="password" id="verification" />
                            </div>
                        </div>
                    </div>
                    <!-- The second column for card number and information about CVV/CVC code -->
                    <div class="checkoutcolumn-2">
                        <label for="cardnumber">Card Number</label>
                        <input type="password" id="cardnumber" />

                        <span class="checkoutinfo">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
                    </div>
                </div>
            </div>

            <!-- The footer of the checkout panel with buttons for back and next steps -->
            <div class="checkoutpanel-footer">
                <button class="checkoutbtn checkoutback-btn">Back</button>
                <button class="checkoutbtn checkoutnext-btn">Next Step</button>
            </div>
        </div>
    </div>

</div>



<!--end of the checkout containter -->

    <!--footer things-->
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
<script>
    $(document).ready(function () {

        $('.method').on('click', function () {
            $('.method').removeClass('blue-border');
            $(this).addClass('blue-border');
        });

    })
    var $cardInput = $('.input-fields input');

    $('.next-btn').on('click', function (e) {

        $cardInput.removeClass('warning');

        $cardInput.each(function () {
            var $this = $(this);
            if (!$this.val()) {
                $this.addClass('warning');
            }
        })
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>