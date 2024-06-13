<?php
  
if (isset($_POST['action']) && $_POST['action'] === 'ordercreate') {
    ordercreate();
}

function ordercreate(){
    // Start the session
    session_start();

    // Connect to the baskets database
    require_once 'connect.php';

    // Set the user ID to retrieve items for
    $user_id = mysqli_real_escape_string($conn, $_SESSION['SessionUserID']);

    // Getting the session variable that contains the total price of cart
    $total = $_SESSION['total'];

    // Get the current month
    $currentMonth = date('F');

    // Get the current year
    $year = date("Y");

    // Retrieve all basket items for the specified user
    $sql = "SELECT * FROM basket WHERE UserID='$user_id'";
    $result = mysqli_query($conn, $sql);

    // Create arrays to store the values for each column
    $quantity = array();
    $product_brand = array();
    $product_name = array();
    $product_id = array();
    $colourway = array();
    $product_size = array();
    $imglink = array();
    $basket_id = array();

    // Loop through the result set and store the values in the arrays
    while ($row = mysqli_fetch_assoc($result)) {
        $quantity[] = $row["Quantity"];
        $product_brand[] = $row["ProductBrand"];
        $product_name[] = $row["ProductName"];
        $product_id[] = $row["ProductID"];
        $product_size[] = $row["ProductSize"];
        $imglink[] = $row["ImgLink"];

        // Add the current item's basket ID to the array of basket IDs
        $basket_id[] = $row["BasketID"];
    }

    // Prepare SQL statement with placeholders for values to be inserted into the orders table
    $sql = "INSERT INTO orders (Year, Month, BasketID, UserID, ProductBrand, ProductName, ProductID, ProductSize, TotalPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare a statement object for the SQL statement to be executed
    $stmt = mysqli_prepare($conn, $sql);

    // If the statement object was successfully prepared
    if ($stmt) {

        // Convert the arrays into comma-separated strings to be inserted into the database
        $basket_id_str = implode(",", $basket_id);
        $product_brand_str = implode(",", $product_brand);
        $product_name_str = implode(",", $product_name);
        $product_id_str = implode(",", $product_id);
        $product_size_str = implode(",", $product_size);

        // Bind values to the placeholders in the SQL statement
        mysqli_stmt_bind_param($stmt, "dsdsssssd", $year, $currentMonth, $basket_id_str, $user_id, $product_brand_str, $product_name_str, $product_id_str, $product_size_str, $total);

        // Execute the statement and check if it was successful
        if (mysqli_stmt_execute($stmt)) {
            header("Location: finalised.php"); //Redirects to index page
            //Clearing user basket after making order
            $query = "DELETE FROM basket WHERE UserID='$user_id'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo '& basket has been refreshed';
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
        // Close the statement object
        mysqli_stmt_close($stmt);

    } else {
        $errorString = "An issue occurred and order could not be processed!";
        echo '
        <div class="alert showAlert show">
            <span class="fa-fw fas fa-exclamation-circle"></span>
            <span class="alertmsg">'.$errorString.'</span>
            <div class="alertclose-btn">
                <span class="fa-fw fas fa-times"></span>
            </div>
        </div>';

        echo '
	    <script>
		    document.querySelectorAll('.alertclose-btn').forEach(function (button) {
			    button.addEventListener('click', function () {
				    button.parentElement.remove();
				    document.querySelectorAll('.alert').forEach(function (alert) {
					    alert.classList.remove('show');
					    alert.classList.add('hide');
				    });
			    });
		    });
	    </script>;
        '
        exit();
    }
}
?>