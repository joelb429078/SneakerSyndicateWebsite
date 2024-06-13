<?php
require_once 'connect.php';

function addToCart($conn, $product_id, $product_name, $product_price, $product_colour, $product_imglink, $product_size, $product_brand) {
    if (isset($_SESSION["SessionUserID"])){
            $user_idforcart = $_SESSION["SessionUserID"];
            if(isset($_SESSION['cart'])) {
                $item = array(
                    'userid' => $_SESSION["SessionUserID"],
                    'product_id' => $product_id,
                    'product_brand' => $product_brand,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_colour' => $product_colour,
                    'product_size' => $product_size,
                    'product_imglink' => $product_imglink,
                    'product_quantity' => "1"
                );

                //establing the array items as query items 
                $insertuser_id = $user_idforcart;
                $insertproduct_id = $item['product_id'];
                $insertproduct_name = $item['product_name'];
                $insertproduct_brand = $item['product_brand'];
                $insertproduct_price = $item['product_price'];
                $insertproduct_colour = $item['product_colour'];
                $insertproduct_quantity = $item['product_quantity'];
                $insertproduct_imglink = $item['product_imglink'];
                $insertproduct_size = $item['product_size'];
                

                //firstly checking to see if the same item has been added before and if it has then it will update accordingly 
                $sql = "SELECT * FROM basket WHERE UserID = '$insertuser_id' AND ProductID = '$insertproduct_id'";
                $result = mysqli_query($conn, $sql);
                // If the product already exists, update the quantity
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $new_quantity = $row['Quantity'] + $insertproduct_quantity;
                    // Prepare the SQL query to update the quantity of the product
                    $sql = "UPDATE basket SET Quantity = '$new_quantity' WHERE UserID = '$insertuser_id' AND ProductID = '$insertproduct_id'";
                    // Execute the SQL query
                    if (mysqli_query($conn, $sql)) {
                        header("location: cart.php");
                    } else {
                        echo 'Error: ' . mysqli_error($conn);
                    }
                    //if it is a unique item we then add it into the database making a new record
                }else{
                    //echo "$insertuser_id, $insertproduct_id, $insertproduct_name, $insertproduct_price , $insertproduct_colour , $insertproduct_quantity, $insertproduct_imglink, $insertproduct_size , $insertproduct_brand";
                    $sql = "INSERT INTO basket(UserID, Quantity, ProductBrand, ProductName, ProductID, ProductPrice, Colourway, ProductSize, ImgLink) VALUES ('$insertuser_id', '$insertproduct_quantity', '$insertproduct_brand', '$insertproduct_name', '$insertproduct_id', '$insertproduct_price', '$insertproduct_colour', '$insertproduct_size' , '$insertproduct_imglink')";	
                    //echo " got to here";
	                $stmt = mysqli_stmt_init($conn); // establishing connection using prior established $conn 
                    //echo " established connection";
	                if (!mysqli_stmt_prepare($stmt, $sql)){ 
                        echo "an error occurred";//preparing the query
		                header("location: index.php?error=stmtfailed=issue=" . mysqli_error($conn)); // if fails header will change alerting the user of this issue 
		                exit();

	                } 
                    mysqli_stmt_execute($stmt); //data will be entered into database
                    //die(print_r(sqlsrv_errors(), true));
                    //$returnlink = "womensaccessoriesproductpage.php?ProductID=$insertproduct_id";
                    array_push($_SESSION['cart'], $item);
                    mysqli_stmt_close($stmt); //closing connection 
                    header("location: cart.php");
                    exit();
                }
                
            } else{
                header("location: womensaccessoriesproductpage.php?ProductID='$product_id'?cart-session-notavaiable");
            }
    }else {
	  	header("location: signupog.php?login-to-continue-shopping");
	    exit();
    }
}


function removeFromCart($product_id) {
    foreach($_SESSION['cart'] as $key => $cart_item) {
        if($cart_item['product_id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            $removesql = "DELETE FROM basket WHERE ProductID = ? AND UserID = ?";
            $removestmt = $conn->prepare($removesql);
            $removestmt->bind_param("ii", $product_id, $user_idforcart);
            $stmt->execute();

            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                heade("location: cart.php?deleted");
            } else {
                echo "location: cart.php?erroroccurred";
            }
            return;
        }
    }
}

function updatequantity() {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    
    // Update the quantity in the baskets table for the corresponding product ID
    $sql = "UPDATE baskets SET Quantity = $quantity WHERE ProductID = $product_id";
    $result = $conn->query($sql);
    
    // Close the database connection
    $conn->close();
    
    // Return a success message
    echo "Quantity updated successfully";
}

// Check if the action parameter is set and call the corresponding function
if (isset($_POST["action"])) {
    $action = $_POST["action"];
    
    if ($action === "updatequantity") {
        updatequantity();
    }
}

?>

