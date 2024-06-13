<?php
    include_once 'header.php';
?>

    <!-- contact us part-->
    <div class="contactformdiv" style="width:100%; height:90vh;margin-top:11%;">
        <iframe src="contactform/contactform.php"></iframe> <!-- iframe of contact form -->
    </div>
    <!--find a store-->
    <div class="contactmapstuff">
        <div class="mapstore" style="display: flex; ">
            <div class="stores" style="box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);">
                <center><h1>Find our nearest stores</h1></center> <!-- header -->
                <div class="subheader">With <b>4 currently open</b> stores, we have our finger on the pulse of streetwear fashion.</div> <!-- store lists div -->
                <div class="storeslists" style="margin-top: 20px; overflow-y: auto; padding-right: 12px; scrollbar-color: #dbdbdb #efefef;">
                    <div class="store" style="cursor: pointer; padding-top: 0; margin-top: 10px; border-top-color: transparent; background: #fff; border-top: 1px solid #ebebeb; padding: 20px 0 20px 28px; font-size: 14px; display: flex; flex-direction: column; width: 40%; padding-right: 10px; max-height: 650px;">
                        <div class="storetitle" style="font-size: 15px; font-weight: 600;">Cardiff Store</div> <!-- store names -->
                        <div class="storeaddress" style="margin-top: 15px;">
                            <span>
                                Shop 41A<br>Sneaker Syndicate<br>St Davids Shopping Centre<br>Cardiff<br>CF64 2PN<br>Wales <!-- store address -->
                            </span>
                        </div>
                        <a href="#" class="storemoreinfo" style="display: none; font-size: 13px; text-align: right; text-decoration: underline; }"></a>
                    </div>

                    <div class="store" style="cursor: pointer; padding-top: 0; margin-top: 10px; border-top-color: transparent; background: #fff; border-top: 1px solid #ebebeb; padding: 20px 0 20px 28px; font-size: 14px; display: flex; flex-direction: column; width: 40%; padding-right: 10px; max-height: 650px;">
                        <div class="storetitle" style="font-size: 15px; font-weight: 600;">Birmingham Store</div> <!-- store names -->
                        <div class="storeaddress" style="margin-top: 15px;">
                            <span>
                                Unit 12B<br>Sneaker Syndicate<br>Bullring Shopping Centre<br>Birmingham<br>B5 4BU<br>England <!-- store address -->
                            </span>
                        </div>
                        <a href="#" class="storemoreinfo" style="display: none; font-size: 13px; text-align: right; text-decoration: underline; }"></a>
                    </div>

                    <div class="store" style="cursor: pointer; padding-top: 0; margin-top: 10px; border-top-color: transparent; background: #fff; border-top: 1px solid #ebebeb; padding: 20px 0 20px 28px; font-size: 14px; display: flex; flex-direction: column; width: 40%; padding-right: 10px; max-height: 650px;">
                        <div class="storetitle" style="font-size: 15px; font-weight: 600;">Glasgow Store</div> <!-- store names -->
                        <div class="storeaddress" style="margin-top: 15px;">
                            <span>
                                Unit 18<br>Sneaker Syndicate<br>Buchanan Galleries<br>Glasgow<br>G1 2FF<br>Scotland <!-- store address -->
                            </span>
                        </div>
                        <a href="#" class="storemoreinfo" style="display: none; font-size: 13px; text-align: right; text-decoration: underline; }"></a>
                    </div>
                    <div class="store" style="cursor: pointer; padding-top: 0; margin-top: 10px; border-top-color: transparent; background: #fff; border-top: 1px solid #ebebeb; padding: 20px 0 20px 28px; font-size: 14px; display: flex; flex-direction: column; width: 40%; padding-right: 10px; max-height: 650px; ">
                        <div class="storetitle" style="font-size: 15px; font-weight: 600;">Manchester Store</div> <!-- store names -->
                        <div class="storeaddress" style="margin-top: 15px;">
                            <span>
                                Shop 21<br>Sneaker Syndicate<br>Trafford Centre<br>Manchester<br>M17 8AA<br>England <!-- store address -->
                            </span>
                        </div>
                        <a href="#" class="storemoreinfo" style="display: none; font-size: 13px; text-align: right; text-decoration: underline; }"></a>
                    </div>

                </div>
            </div>
            <div class="stores" style="width:40%; padding-left: 10px;">
                 <iframe style="width: 100%; height:100%; margin: 0px; padding: 0px; position: relative;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2484.79978117863!2d-3.177716783721708!3d51.48018932963061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1675635658593!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> <!-- iframe with google maps so that users can view store locations -->
            </div>
        </div>
    </div>

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
<!--test script with list of suggestions-->
<script type="text/javascript" src="js/code.js"></script>
<script src="js/script.js"></script>