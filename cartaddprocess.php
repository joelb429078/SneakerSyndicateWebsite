<?php
session_start();
require_once 'connect.php';

// Check if user is logged in and if ProductID is set
if(isset($_SESSION['SessionUserID'])){
    if(isset($_GET{'ProductID'})){
    
        $ProductID = mysqli_real_escape_string($conn, $_GET['ProductID']);

        // Retrieve product information from the database based on ProductID
        $SQL="SELECT * FROM product WHERE ProductID='$ProductID'";
        $result = mysqli_query($conn, $SQL) or die("Bad Query: $SQL");
        $row = mysqli_fetch_array($result);

        // Redirect based on product category
        $category = $row['Category'];
        switch ($category) {
            case 'Kids accessories':
                $try_again_url = 'kidsaccessoriesog.php?tryagain';
                $error_url = 'kidsaccessoriesog.php?error=cartadderror-selectasize';
                break;
            case 'Mens accessories':
                $try_again_url = 'mensaccessoriesog.php?tryagain';
                $error_url = 'mensaccessoriesog.php?error=cartadderror-selectasize';
                break;
            case 'Womens accessories':
                $try_again_url = 'womensaccessoriesog.php?tryagain';
                $error_url = 'womensaccessoriesog.php?error=cartadderror-selectasize';
                break;
            case 'Womens clothes':
                $try_again_url = 'womensproductsog.php?tryagain';
                $error_url = 'womensproductsog.php?error=cartadderror-selectasize';
                break;
            case 'Mens clothes':
                $try_again_url = 'mensproductsog.php?tryagain';
                $error_url = 'mensproductsog.php?error=cartadderror-selectasize';
                break;
            case 'Kids clothes':
                $try_again_url = 'kidsproductsog.php?tryagain';
                $error_url = 'kidsproductsog.php?error=cartadderror-selectasize';
                break;
            case 'Shoes':
                $try_again_url = 'shoesproductsog.php?tryagain';
                $error_url = 'shoesproductsog.php?error=cartadderror-selectasize';
                break;
            default:
                $try_again_url = 'womensaccessoriesog.php?tryagain';
                $error_url = 'womensaccessoriesog.php?error=cartadderror-selectasize';
                break;
        }

    } else {
        header('location: womensaccessoriesog.php?tryagain');
        exit;
    }

    // Session has been started and user_id is set
    // Check if 'Add to Cart' button is clicked
    if (isset($_POST["cartaddbtn"])) {
        // Get product information
        $product_id = $row["ProductID"];
        $product_brand = $row["ProductBrand"];
        $product_name = $row["ProductName"];
        $product_price = $row["ProductPrice"];
        $product_colour = $row["Colourway"];
        $product_imglink = $row["ImgLink"];

        // Check if product size is selected
        if(isset($_POST['size'])){
            $product_size = $_POST['size']; //  Displaying Selected Value
        } else {
            // Redirect with error message if product size is not selected
            header("location: $error_url");
            mysqli_close($conn);
            exit;
        }

        // Add product to shopping cart
        require_once 'shoppingcartcode.php';
        addToCart($conn, $product_id, $product_name, $product_price, $product_colour, $product_imglink, $product_size,$product_brand);

    }
    else{ //If there is an error a suitable error code related to the issue will be depicted in the header
        header("location: $error_url");
        exit;
    }
    
} else { //if user is not logged in they will be redirected to the sign-in/sign up page
    header("location: login.php");
    exit;
}


?>