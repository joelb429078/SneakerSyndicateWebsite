<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="style.css" />
    <!-- Link to Font Awesome icons -->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>

    <?php
        // Check if the 'error' parameter was set in the URL
        if (isset($_GET['error'])) {
            // Get the error message from the 'error' parameter
            $error = $_GET['error'];

            // Display an alert message with the error message
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

    <div class="container">
      <div class="form">
        <!-- Contact information section -->
        <div class="contact-info">
          <h3 class="title">Contact us</h3>
          <p class="text">
            This is the offical contact portal for the Sneaker Syndicate. For many queries or questions you may have feel free to contact via the methods below or even use the contact us form to message our customer service directly. 
          </p>
          <!-- Contact information details -->
          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>HQ - Somewhere down London</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>Email - customersupport@SneakerSyndicate.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>Phone - 02920 499125</p>
            </div>
          </div>
          <!-- Social media section -->
          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Contact form section -->
        <div class="contact-form">
            <div class="contact-form">
                <!-- Form element -->
                <form action="../formaction.php" method="post" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <!-- Name input element -->
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Name</label>
                        <span>Name</span>
                    </div>
                    <!-- Email input element -->
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <!-- Subject input element -->
                    <div class="input-container">
                        <input type="text" name="subject" class="input" />
                        <label for="">Subject</label>
                        <span>Subject</span>
                    </div>
                    <!-- Message input element -->
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <!-- Submit button-->
                    <input type="submit" name="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
