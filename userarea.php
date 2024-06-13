<?php
// Include the fill that contains the database connection information
require_once "connect.php";
// Include the header file
include_once "header.php";
// Include the user info functions file
include_once "userinfofunctions.php";
// Check if the session variable for the user ID exists
if(isset($_SESSION["SessionUserID"])){
    // Escape the user ID to prevent SQL injection attacks
    $userID = mysqli_real_escape_string($conn, $_SESSION["SessionUserID"]);
    // Construct a SQL query to retrieve the user's information based on their ID
    $SQL="SELECT * FROM users WHERE UserID='$userID'";
    // Execute the SQL query
    $result = mysqli_query($conn, $SQL) or die("Bad Query: $SQL");
    // Fetch the result row into an array
    $row = mysqli_fetch_array($result);
}else{
    // If the session variable for the user ID does not exist, redirect to the login page with an error message
    header('Location: index.php?/cannotfinduser');
}
// Check if an error message was passed in the URL as a GET parameter
if (isset($_GET['error'])) {
    // Store the error message in a variable
    $error = $_GET['error'];
    // Output an HTML element that displays the error message
    echo "<div class=\"alert showAlert show\">
            <span class=\"fa-fw fas fa-exclamation-circle\"></span>
            <span class=\"alertmsg\">" . $error . "</span>
            <div class=\"alertclose-btn\">
            <span class=\"fa-fw fas fa-times\"></span>
            </div>
        </div>

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
        <!-- The outermost container for the user settings page -->
        <div class="usersettingsite" id="page" style="width: 100%; height: 100%; background-color: #fff; position:absolute; top:20%;">
        <!-- The user greeting section -->
        <div class="greet userbox" style="width: 30%; height: 12%; position: absolute; margin-left: 35%; top: 5%; margin-bottom:2%; background-color: #fff; border-radius: 20px; box-shadow: 0px 10px 200px 1px #c2c2c2;">
            <h2 style="font-size:30px; color: #808080;padding:20px 50px 20px 50px; margin-left:10%;">Welcome back <span style="font-size:25px; color: #00ff90; font-weight:500;" class="usernamespan" id="usernamessection"><?php echo $row["FirstName"]?> <?php echo $row["Surname"]?></span></h2>
            <p style="transform:translateY(-50%)translateX(20px);">All your information and other details can be found here and even changed as well!</p>
        </div>
        <!-- The sidebar container -->
        <div class="sidebarcontainer">
            <ul>
            <!-- Profile section -->
            <li id="profile">
                <i class="fas fa-user"></i>
                <span class="sidebar-text">Profile</span>
            </li>
            <!-- Payment section -->
            <li id="payment">
                <i class="fas fa-money"></i>
                <span class="sidebar-text">Payment</span>
            </li>
            <!-- Home section -->
            <li id="home">
                <i class="fas fa-home"></i>
                <span class="sidebar-text">Home</span>
            </li>
            <!-- Sign out button -->
            <li>
                <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span class="sidebar-text">Sign Out</span>
                </a>
            </li>
            </ul>
        </div>
        <!-- JavaScript to redirect to the logout page -->
        <script>
            // Get the link element with href='logout.php'
            var link = document.querySelector('a[href="logout.php"]');
            // If the link element exists and has the correct href attribute value
            if (link && link.getAttribute('href') === 'logout.php') {
            // Redirect the user to the logout page
            window.location.href = 'logout.php';
            } 
        </script>

        <!--personal information part-->
        <section id="profile-section"> <!-- A section with an ID of "profile-section" -->
            <div class="gridContainer" style="margin-top:25%;"> <!-- A div with a class of "gridContainer" and a style attribute with a margin-top of 25% -->
                <h3 class="addytitle">Account Information</h3> <!-- A header with a class of "addytitle" and the text "Account Information" -->
                <center><h3 style="font-size:14px;" class="addytitle">(Click to change)</h3></center> <!-- A centered header with a class of "addytitle", a font size of 14px, and the text "(Click to change)" -->
                <form class="userpersonalinfo" method="post" action="userinfofunctions.php"> <!-- A form with a class of "userpersonalinfo", a method of "post", and an action of "userinfofunctions.php" -->
                    <div class="form-groupud"> <!-- A div with a class of "form-groupud" -->
                        <label for="fullName">Full Name</label> <!-- A label with a "for" attribute set to "fullName" and the text "Full Name" -->
                        <input type="text" placeholder="<?php echo $row["FirstName"] . ' ' . $row["Surname"]; ?>" class="form-control" id="fullName" name="fullName"> <!-- An input field with a type of "text", a placeholder that displays the user's first and last name, a class of "form-control", an ID of "fullName", and a name of "fullName" -->
                    </div>
                    <div class="form-groupud"> <!-- Another div with a class of "form-groupud" -->
                        <label for="email">Email</label> <!-- Another label with a "for" attribute set to "email" and the text "Email" -->
                        <input type="email" style="width:200px;" placeholder="<?php echo $row["Email"]; ?>" class="form-control" id="email" name="email"> <!-- Another input field with a type of "email", a style attribute that sets the width to 200px, a placeholder that displays the user's email, a class of "form-control", an ID of "email", and a name of "email" -->
                    </div>
                    <div class="form-groupud"> <!-- Another div with a class of "form-groupud" -->
                        <label for="pass">Password</label> <!-- Another label with a "for" attribute set to "pass" and the text "Password" -->
                        <input type="password" placeholder="********" class="form-control" id="pass" name="pass"> <!-- Another input field with a type of "password", a placeholder that displays a series of asterisks, a class of "form-control", an ID of "pass", and a name of "pass" -->
                    </div>
                    <div class="saveorcancel" style="display: flex; transform:translateY(-40%);"> <!-- A div with a class of "saveorcancel" and a style attribute that sets the display to flex and moves the div up by 40% -->
                        <button type="submit" class="userpersonalbtn userpersonalbtn-primary btn-block" name="saveChanges">Save Changes</button> <!-- A button with a type of "submit", two classes of "userpersonalbtn" and "userpersonalbtn-primary", a block style, and a name of "saveChanges" -->
                        <button type="button" class="userpersonalbtn userpersonalbtn-default btn-block">Cancel</button>
                    </div>
                </form>
            </div>
        </section>
        
        <!--payment part-->
        <section id="payment-section">
            <!-- Creates a container for the credit card -->
            <div class="gridContainer">
                <!-- Creates a div for the credit card -->
                <div class="creditCard">
                    <!-- Creates a div for the Visa logo image -->
                    <div class="visaLogo">
                        <!-- Creates an SVG for the Visa logo -->
                        <svg class="visa" enable-background="new 0 0 291.764 291.764" version="1.1" viewbox="5 70 290 200" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <!-- Creates a path for the Visa logo -->
                            <path class="svgcolor" d="m119.26 100.23l-14.643 91.122h23.405l14.634-91.122h-23.396zm70.598 37.118c-8.179-4.039-13.193-6.765-13.193-10.896 0.1-3.756 4.24-7.604 13.485-7.604 7.604-0.191 13.193 1.596 17.433 3.374l2.124 0.948 3.182-19.065c-4.623-1.787-11.953-3.756-21.007-3.756-23.113 0-39.388 12.017-39.489 29.204-0.191 12.683 11.652 19.721 20.515 23.943 9.054 4.331 12.136 7.139 12.136 10.987-0.1 5.908-7.321 8.634-14.059 8.634-9.336 0-14.351-1.404-21.964-4.696l-3.082-1.404-3.273 19.813c5.498 2.444 15.609 4.595 26.104 4.705 24.563 0 40.546-11.835 40.747-30.152 0.08-10.048-6.165-17.744-19.659-24.035zm83.034-36.836h-18.108c-5.58 0-9.82 1.605-12.236 7.331l-34.766 83.509h24.563l6.765-18.08h27.481l3.51 18.153h21.664l-18.873-90.913zm-26.97 54.514c0.474 0.046 9.428-29.514 9.428-29.514l7.13 29.514h-16.558zm-160.86-54.796l-22.931 61.909-2.498-12.209c-4.24-14.087-17.533-29.395-32.368-36.999l20.998 78.33h24.764l36.799-91.021h-24.764v-0.01z" fill="#A9CBDC"></path>
                            <!-- Creates a path for the Visa logo tip -->
                            <path d="M327.6 51.2H56.4C25.2 51.2 0 76.8 0 107.6v158.8c0 31.2 25.2 56.8 56.4 56.8H328c31.2 0 56.4-25.2 56.4-56.4V107.6c-.4-30.8-25.6-56.4-56.8-56.4zm-104 86.8c.4 1.2.4 2 .8 2.4 0 0 0 .4.4.4.4.8.8 1.2 1.6 1.6 14 10.8 22.4 27.2 22.4 44.8s-8 34-22.4 44.8l-.4.4-1.2 1.2c0 .4-.4.4-.4.8-.4.4-.4.8-.8 1.6v74h-62.8v-73.2-.8c0-.8-.4-1.2-.4-1.6 0 0 0-.4-.4-.4-.4-.8-.8-1.2-1.6-1.6-14-10.8-22.4-27.2-22.4-44.8s8-34 22.4-44.8l1.6-1.6s0-.4.4-.4c.4-.4.4-1.2.4-1.6V64.8h62.8v72.4c-.4 0 0 .4 0 .8zm147.2 77.6H255.6c4-8.8 6-18.4 6-28.4 0-9.6-2-18.8-5.6-27.2h114.4v55.6h.4zM13.2 160H128c-3.6 8.4-5.6 17.6-5.6 27.2 0 10 2 19.6 6 28.4H13.2V160zm43.2-95.2h90.8V134c-4.4 4-8.4 8-12 12.8h-122V108c0-24 19.2-43.2 43.2-43.2zm-43.2 202v-37.6H136c3.2 4 6.8 8 10.8 11.6V310H56.4c-24-.4-43.2-19.6-43.2-43.2zm314.4 42.8h-90.8v-69.2c4-3.6 7.6-7.2 10.8-11.6h122.8v37.6c.4 24-18.8 43.2-42.8 43.2zm43.2-162.8h-122c-3.2-4.8-7.2-8.8-12-12.8V64.8h90.8c23.6 0 42.8 19.2 42.8 42.8v39.2h.4z" data-original="#005F75" class="active-path" data-old_color="#005F75" fill="rgba(0,0,0,.4)" />
                        </svg>
                    </div>
                    <ul class="ccList">
                        <li> </li>
                    </ul>
                    <h4 class="name"> </h4>
                    <h4 class="year">   </h4>
                </div>
                <!-- This is a form for entering payment details -->
                <form action="#" id="paymentForm" class="paymentform">
                    <!-- This is a heading for the payment details section -->
                    <h6>Payment Details</h6>
                    <!-- This is a container for the name on card input field -->
                    <div class="inputCon" id="name" data-top="Name on Card">
                        <input type="text" placeholder="None" />
                    </div>
                    <!-- This is a container for the card number input field -->
                    <div class="inputCon" id="cardNum" data-top="Card Number" title="type in the card number without spaces">
                        <input type="text" placeholder="**** **** **** ****" />
                    </div>
                    <!-- This is a container for the valid through input field -->
                    <div class="inputCon" id="validYear" data-top="Valid Through">
                        <input type="text" placeholder="--/--" />
                    </div>
                    <!-- This is a container for the CVV input field -->
                    <div class="inputCon" id="cvv" data-top="CVV">
                        <input type="text" placeholder="***" />
                    </div>
                    <!-- This is a container for the save and cancel buttons, positioned absolutely and translated -->
                    <div class="saveorcancel" style="display: flex; transform: translateX(-80%) translateY(390%); position: absolute;">
                        <!-- This is a button for saving the payment details to Stripe -->
                        <button type="button" class="userpersonalbtn userpersonalbtn-primary btn-block" onclick="window.location.href='http://stripe.com'">Save to Stripe</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- shipping information section-->
    
        <section id="home-section">
            <div class="gridContainer">
                <h3 class="addytitle">Address and contact information</h3>
                <div class="usershipinfocont">
                    <!-- This is the container for the user's residential address info -->
                    <div class="usershipinfocontindv" style="margin-right: 40px;">
                        <!-- This is the icon for the residential address -->
                        <div class="shipicon">
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.08333 17H4.25L17 4.25L29.75 17H26.9167" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.08337 17V26.9167C7.08337 28.4815 8.3519 29.75 9.91671 29.75H24.0834C25.6482 29.75 26.9167 28.4815 26.9167 26.9167V17" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.75 29.75V21.25C12.75 19.6852 14.0185 18.4167 15.5833 18.4167H18.4167C19.9815 18.4167 21.25 19.6852 21.25 21.25V29.75" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <!-- This is the label for the residential address -->
                        <h4 class="resiname">Residential address</h4>
                        <!-- This is the user's residential address info -->
                        <center>
                            <p class="resiaddy">
                                <?php
                                // Retrieve the user's address from the database
                                $addresspart1 = $row['AddressLine1'];
                                $addresspart2 = $row['AddressLine2'];

                                // If the address is not empty, display it
                                if ($addresspart2 != "" && $addresspart2 != ""){
                                    echo $addresspart1;
                                    echo $addresspart2;
                                }else {
                                    // If the address is empty, display a message asking the user to add an address
                                    echo "Add an address";
                                }
                                ?>
                            </p>
                        </center>
                        <!-- This is the button to report a relocation of the residential address -->
                        <div class="useraddybtn active" href="#popup1">
                            <a href="#popup1" style="text-decoration:none; color: #fff;">Report relocation</a>
                        </div>
                    </div>

                    <!-- This is the container for the pickup address info -->
                    <div class="usershipinfocontindv">
                        <!-- This is the icon for the pickup address -->
                        <div class="shipicon">
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.1667 29.75V20.5416C14.1667 17.8032 11.9467 15.5833 9.20833 15.5833C6.46992 15.5833 4.25 17.8032 4.25 20.5416V29.75H29.75V21.25C29.75 18.1204 27.2129 15.5833 24.0833 15.5833H9.20833" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17 15.5833V4.25H22.6667L25.5 7.08333L22.6667 9.91667H17" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.5 21.25H9.91667" stroke="#232532" stroke-width="2.125" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>

                        <h4 class="resiname">Pickup address</h4>

                        <div class="resichip">No Local pickups available</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- popup-->
        <div id="popup1" class="addyoverlay">
            <div class="addypopup">
                <h2 style="border-bottom: 2px solid #00ff90 ; width:200px;">Address details:</h2> <!-- header of the popup window -->
                <a class="addyclose" href="#">&times;</a> <!-- close button of the popup window -->
                <div class="addycontent"> <!-- content of the popup window -->
                    View and edit your address info by here: <!-- description of the form -->
                    <div class="addypopupform-group"> <!-- form group of the form -->
                        <form method="post" action="useraddressfunctions.php"> <!-- form for submitting user's address details to a PHP script -->
                            <input type="street" class="addypopupform-control" name="street" id="autocomplete" placeholder="Street"> <!-- input field for street -->
                            <input type="city" class="addypopupform-control" name="city" id="inputCity" placeholder="City"> <!-- input field for city -->
                            <input type="postcode" class="addypopupform-control" name="postcode" id="inputZip" placeholder="Postcode"> <!-- input field for postcode -->
                            <input type="flathousenumber" class="addypopupform-control" name="housenum" id="inputhousenum" placeholder="Flat/house number"> <!-- input field for flat/house number -->
                            <input type="county" class="addypopupform-control" name="county" id="inputCounty" placeholder="County"> <!-- input field for county -->
                            <button type="submit" class="addypopupform-controlbtn" name="submit">Submit</button> <!-- submit button for the form -->
                        </form>
                    </div>
                </div>
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
    <script>
    // Get all the sidebar items
    const sidebarItems = document.querySelectorAll('.sidebarcontainer li');

    // Add click event listener to each sidebar item
    sidebarItems.forEach(item => {
      item.addEventListener('click', () => {
        // Get the id of the clicked item
        const sectionId = item.getAttribute('id') + '-section';

        // Scroll to the corresponding section of the page
        document.getElementById(sectionId).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
    </script>
    <script>
        // Establishing variables 
        var loginpart = document.getElementById("login");
        var registerpart = document.getElementById("register")
        var actuatorbtn = document.getElementById("form-btn")

        function register() { // Function for when a person selects register 
            loginpart.style.left = "-400px";
            registerpart.style.left = "50px";
            actuatorbtn.style.left = "110px";
        }

        function login() { // Function for when a person selects login
            loginpart.style.left = "50px";
            registerpart.style.left = "450px";
            actuatorbtn.style.left = "0px";
        }

    </script>
    <script type="text/javascript" src="js/code.js"></script>
    <script src="js/script.js"></script>
