<?php
require_once "connect.php";

// Get the product ID and quantity from the AJAX request
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

// Update the quantity value in the database
$query = "UPDATE basket SET Quantity = '$quantity' WHERE ProductID = '$productId'";
$result = mysqli_query($conn, $query);

if ($result) {
	echo '<script>alert("Success!")</script>'; // Alerts the user with a popup 
} else {
	echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>'; // Alerts the user with a popup with the details of the error 
}
?>