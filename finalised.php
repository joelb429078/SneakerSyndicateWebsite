<?php
    include_once 'header.php'; // loads the header section
?>

    <div class="checkoutbackground">
        <div class="checkout-panel">
            <div class="checkoutpanel-body">
                <h2 class="checkouttitle">Finalised</h2> <!-- Header -->

                <div class="checkoutprogress-bar">  <!-- progress bar, that is now complete to indicate that the  -->
                    <div class="checkoutstep active"></div>
                    <div class="checkoutstep active"></div>
                    <div class="checkoutstep active"></div>
                    <div class="checkoutstep active"></div>
                </div>

                <h2>Your Order has been finalised</h2> <!-- Message clarifying to the user that their order has gone through -->  
                <p>It will be with you shortly!</p>
            </div>

            <div class="checkoutpanel-footer"> <!-- Footer section with back and home buttons  -->
                <button class="checkoutbtn checkoutback-btn" onclick="location.href = 'checkout.php?UserID=<?php echo $user_id;?>'">Back</button> 
                <button class="checkoutbtn checkoutnext-btn" onclick="location.href = 'index.php'" type="button">Home</button>
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