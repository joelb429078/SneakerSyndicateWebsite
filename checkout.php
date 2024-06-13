<?php
    // Include necessary files
    include_once 'header.php';
    require_once 'connect.php';
    require_once 'ordercreation.php';

    // Get the total from the session
    $total = $_SESSION['total'];
?>

<!-- Checkout section-->
<div class="checkoutbackground">
    <div class="checkout-panel">
        <div class="checkoutpanel-body">
            <h2 class="checkouttitle">Checkout here!</h2> <!-- main title -->

            <div class="checkoutprogress-bar">
                <div class="checkoutstep active"></div> <!-- stage animated section --> 
                <div class="checkoutstep active"></div>
                <div class="checkoutstep"></div>
                <div class="checkoutstep"></div>
            </div>


            <!-- Payment form using the Stripe payment service -->
            <div class="checkoutpayment-method">
              <form id="payment-form">
                <!-- Label with input field that the user can select to choose Stripe as their payment method -->
                <label for="stripe" class="checkoutmethod">
                  <img src="./img/Stripe.png" class="checkoutcard-logos" />
                  <div class="radio-input">
                    <!-- Display of the total amount of the purchase. -->
                    <input id="stripe" type="radio" name="payment" value="stripe">
                    Pay £<?php echo number_format($total, 2);?> with Stripe
                  </div>
                </label>
              </form>
            </div>

            <!-- Input fields for the customer's payment information -->
            <div class="checkoutinput-fields">
              <!-- Input fields for the customer's name, card expiration date, and card verification code -->
              <div class="checkoutcolumn-1">
                <label for="cardholder">Name</label>
                <!-- Name input -->
                <input type="text" id="cardholder" name="cardholder" required />

                <!-- Input fields for the card expiration date and card verification code -->
                <div class="checkoutsmall-inputs">
                  <div>
                    <label for="date">Valid date</label>
                    <!-- Input field for card's expiration date -->
                    <input type="text" id="date" name="date" required />
                  </div>

                  <div>
                    <label for="verification">CVV / CVC *</label>
                    <!-- Input field requires the customer to input the card's verification code -->
                    <input type="password" id="verification" name="verification" required />
                  </div>
                </div>
              </div>
              <div class="checkoutcolumn-2">
                <label for="cardnumber">Card Number</label>
                <!-- Input field for card number -->
                <input type="password" id="cardnumber" name="cardnumber" required />
                <span class="checkoutinfo">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
              </div>
            </div>
        </div>
        <!-- forward and back buttons -->
        <div class="checkoutpanel-footer">
            <button class="checkoutbtn checkoutback-btn" onclick="location.href = 'cart.php'">Back</button>
            <!--<?php
            if ($transactionSuccess && $payment->isSuccessful()) {
              echo '<button class="checkoutbtn checkoutnext-btn" type="button" onclick="callOrderCreate()">Next Step</button>';
            } else {
              echo '<button class="checkoutbtn checkoutnext-btn" type="button" onclick="alert(\'Transaction unsuccessful\')">Next Step</button>';
            }
            ?>-->
            <button class="checkoutbtn checkoutnext-btn" type="button" id="checkout-btn">Next Step</button>
        </div>
    </div>
</div>

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
<script src="js/alertbtn.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
  // form validation
  const paymentForm = document.querySelector('#payment-form');
  const paymentDetailsForm = document.querySelector('#payment-details-form');

  function validatePaymentForm() {
    if (!paymentForm.checkValidity()) {
      alert("Please select a payment method.");
      return false;
    }
    return true;
  }

  function validatePaymentDetailsForm() {
    if (!paymentDetailsForm.checkValidity()) {
      alert("Please fill in all required fields.");
      return false;
    }
    return true;
  }

  paymentDetailsForm.addEventListener('submit', (e) => {
    e.preventDefault();
    if (validatePaymentForm() && validatePaymentDetailsForm()) {
      // submit the payment details form
      paymentDetailsForm.submit();
    }
  });
</script>
<script>
// Get the input elements
document.getElementById("checkout-btn").addEventListener("click", function() {
    var cardholder = document.getElementById("cardholder").value;
    var date = document.getElementById("date").value;
    var verification = document.getElementById("verification").value;
    var cardnumber = document.getElementById("cardnumber").value;
    var stripeRadio = document.getElementById('stripe');
    // Validate inputs
    var errors = [];

    // Verify cardholder input
    if (cardholder.trim() === "") {
        errors.push("Name is required");
    } else if (!/^[A-Za-z\s-]+$/.test(cardholder)) {
        errors.push("Name should only contain letters and '-' symbol");
    }

    // Verify stripeRadio has been selected
    if (!stripeRadio.checked) {
      errors.push("Select payment method");
    }

    // Verify verification input
    if (verification.trim() === "") {
        errors.push("CVV / CVC is required");
    } else if (!/^\d+$/.test(verification)) {
        errors.push("CVV / CVC should only contain integers");
    }

    // Verify date input
    if (date.trim() === "") {
        errors.push("Valid date is required");
    } else {
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        var currentMonth = currentDate.getMonth() + 1;
        var [month, year] = date.split("/");
        year = parseInt(year) + 2000; // Convert YY to YYYY format
        if (isNaN(month) || isNaN(year) || month < 1 || month > 12 || year < currentYear || (year == currentYear && month < currentMonth)) {
            errors.push("Valid date should be in MM/YY format and not earlier than 4 years from current date");
        }
    }

    if (cardnumber.trim() === "") {
        errors.push("Card number is required");
    } else if (!/^\d{16}$/.test(cardnumber)) {
        errors.push("Card number should be a sixteen digit number");
    }

    if (errors.length === 0) {
      // Inputs are valid, continue with payment processing
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "ordercreation.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          // If the response from the server is successful, redirect to finalised.php
          window.location.href = "finalised.php";
        }
      };
      xhr.send("action=ordercreate");
    } else {
      // Display error messages in separate alerts
      for (var i = 0; i < errors.length; i++) {
        var errorString = errors[i];
        var alertHTML = `
          <div class="alert showAlert show">
            <span class="fa-fw fas fa-exclamation-circle"></span>
            <span class="alertmsg">${errorString}</span>
            <div class="alertclose-btn">
              <span class="fa-fw fas fa-times"></span>
            </div>
          </div>
        `;
        document.body.innerHTML += alertHTML;
      }
      // When the X close button is clicked 
      document.querySelectorAll('.alertclose-btn').forEach(function (button) {
        button.addEventListener('click', function () {
          // Remove the parent element of the clicked button
          button.parentElement.remove();
          // Remove the "show" class and add the "hide" class to the element with the "alert" class
          document.querySelectorAll('.alert').forEach(function (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');
          });
        });
      });
    }
});
</script>
<script>
  var handler = StripeCheckout.configure({
    key: 'pk_test_51MhhDUAmaIA48jX6AhCQgiqAcUP0lSr5MJ18hXbtYlAJsLzbe2pwu5VHSyAeUm1PiOZiGaedAcHnYOZrH7srJTFh0093gzQFLR',
    locale: 'auto',
    token: function(token) {
      // You can use the token to create a charge or a customer
      // token.id is the ID of the token
    }
  });

  var form = document.getElementById('payment-details-form');

  form.addEventListener('submit', function(e) {
    // Prevent the form from submitting
    e.preventDefault();

    var paymentType = document.querySelector('input[name="payment"]:checked').value;

    if (paymentType === 'stripe') {
      // Open Checkout with further options
      handler.open({
        name: 'Sneaker Sydnicate',
        description: 'Payment for products',
        amount: <?php echo $total * 100; ?>,
      });
    } else {
      // Call the server to process other payment types
      form.submit();
    }
  });

  // Close Checkout on page navigation
  window.addEventListener('popstate', function() {
    handler.close();
  });
</script>
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