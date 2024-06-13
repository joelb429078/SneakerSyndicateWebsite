<?php
    // Including the header.php file to use its content in this file
    include_once 'header.php';
    // Checking if the error message exists in the GET request parameters
    if (isset($_GET['error'])) {
        // Assigning the error message to a variable
        $error = $_GET['error'];
        // Displaying the error message using a HTML and CSS code snippet
        echo "<div class=\"alert showAlert show\">
                <span class=\"fa-fw fas fa-exclamation-circle\"></span>
                <span class=\"alertmsg\">" . $error . "</span>
                <div class=\"alertclose-btn\">
                <span class=\"fa-fw fas fa-times\"></span>
                </div>
            </div>
            // Adding a JavaScript code to handle the close button click event of the error message div
            <script>
            // When the X close button is clicked 
            document.querySelectorAll('.alertclose-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                // Remove the parent element of the clicked button
                button.parentElement.remove();
                // Remove the \"show\" class and add the \"hide\" class to the element with the \"alert\" class
                document.querySelectorAll('.alert').forEach(function (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                });
                });
            });
            </script>";
    }
?>
    <div class="signinsection">
        <center>
            <div class="overallcontainer" id="overallcontainer" style="margin-top:5%;">
                <!-- The registration form -->
                <div class="form-container register-container">
                    <form method="post" action="signupcheck.php" style=" width: 100%; height: 100%; display: flex; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center; flex-direction: column; background-color: #fff; padding: 0 2.5rem; text-align: center;">
                        <div class="header">Register</div>
                        <div class="socials-wrapper">
                            <!-- Social media icons for registration -->
                            <ul>
                                <li><a href="www.facebook.com" class="facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="www.twitter.com" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="www.accounts.google.com" class="google" target="_blank"><i class="fab fa-google"></i></a></li>
                            </ul>

                            <header>
                                <h2>Register with details</h2>
                            </header>
                        </div>

                        <div class="button-input-group">
                            <!-- Form fields for registration -->
                            <div class="group input-group">
                                <input type="text" name="name" placeholder="First Name" required>
                            </div>
                            <div class="group input-group">
                                <input type="text" name="surname" placeholder="Surname" required>
                            </div>
                            <div class="group input-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="group input-group">
                                <input type="password" name="pwd" placeholder="Password" required pattern=".{4,}">
                            </div>
                            <div class="group input-group">
                                <input type="password" name="pwdrepeat" placeholder="Re-enter Password" required pattern=".{4,}">
                            </div>
                            <div class="group button-group">
                                <button name="submit" class="signup-btn">Sign Up</button>
                            </div>
                        </div>

                    </form>
                    <?php
                    // PHP code for registration form submission
                    ?>
                </div>

                <div class="form-container  login-container">
                    <!-- The login form -->
                    <form method="post" action="signincheck.php" style=" width: 100%; height: 100%; display: flex; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center; flex-direction: column; background-color: #fff; padding: 0 2.5rem; text-align: center;">
                        <div class="header">Login</div>
                        <div class="socials-wrapper">
                            <!-- Social media icons for login -->
                            <ul>
                                <li><a href="www.facebook.com" class="facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="www.twitter.com" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="www.accounts.google.com" class="google" target="_blank"><i class="fab fa-google"></i></a></li>
                            </ul>

                            <header>
                                <h2>Login with details</h2>
                            </header>
                        </div>
                        <!-- Form fields for login -->
                        <div class="button-input-group">
                            <div class="group input-group">
                                <input name="loginemail" type="email" placeholder="Email" required>
                            </div>
                            <div class="group input-group">
                                <input name="loginpwd" type="password" placeholder="Password" required pattern=".{4,}">
                            </div>
                            <div class="group button-group">
                                <button name="loginsubmit" class="signin-btn">Sign in</button>
                            </div>
                        </div>
                    </form>     
                </div>
                <!-- overlay sections-->
                <div class="overlay-container">
                    <div class="overlay">
                        <!-- section for login -->
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back</h1>
                            <p style="padding: 20px;">Sign back into your account and pick-up where you left off!</p>

                            <div class="group button-group">
                                <button class="trigger" id="login">Sign in</button>
                            </div>
                        </div>
                        <!-- section for registration -->
                        <div class="overlay-panel overlay-right">
                            <h1>Welcome</h1>
                            <p style="padding: 20px;">Enjoy all the benefits and perks of the Sneaker Syndicate. <b>Sign Up now!</b></p>

                            <div class="group button-group">
                                <button class="trigger" id="register">Sign up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
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
<script>
    // Selecting the HTML elements with the IDs 'register', 'login', and 'overallcontainer'
    const registerBtn = document.getElementById("register");
    const loginBtn = document.getElementById("login");
    const overallcontainer = document.getElementById("overallcontainer");

    // Adding an event listener to the 'register' button that toggles a CSS class on the 'overallcontainer' element when clicked
    registerBtn.addEventListener("click", () => {
        overallcontainer.classList.add("right-panel-active");
    });

    // Adding an event listener to the 'login' button that removes a CSS class from the 'overallcontainer' element when clicked
    loginBtn.addEventListener("click", () => {
        overallcontainer.classList.remove("right-panel-active");
    });

</script>