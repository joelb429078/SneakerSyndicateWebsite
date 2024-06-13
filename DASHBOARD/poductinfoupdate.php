
<?php

function newprod(){
	session_start();

    // Connect to the baskets database
    require_once '../connect.php';

	// Process the form submission
	$category = $_POST['category'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$prodname = $_POST['prodname'];
	$description = $_POST['description'];
	$colourway = $_POST['colourway'];
	$stock = $_POST['stock'];


	// Creating the url
	// Receiving items
	$filePath = "img/";

	// First part is dictated by the category enterred so clothes or accesories or shoes
	if ($category === "Mens clothes" || $category === "Womens clothes" || $category === "Kids clothes") {
		$filePath .= "clothes/";
	} else if ($category === "Mens accessories" || $category === "Womens accessories" || $category === "Kids accessories") {
		$filePath .= "accessories/";
	} else if ($category === "Shoes") {
		$filePath .= "shoes/";
	}

	// Next part depends who the items are for so Kids, Mens or Womens
	if ($category === "Mens clothes" || $category === "Mens accessories") {
		$filePath .= "Mens/";
	} else if ($category === "Womens clothes" || $category === "Womens accessories") {
		$filePath .= "Womens/";
	} else if ($category === "Kids clothes" || $category === "Kids accessories") {
		$filePath .= "Kids/";
	}

	// Combining all aspects to generate a filepath 
	$filePath .= $brand . '/' . $prodname . '/' . $colourway . '/' . $colourway;

	$prodname = filter_var($prodname, FILTER_SANITIZE_STRING);
	$colourway = filter_var($colourway, FILTER_SANITIZE_STRING);
	$category = filter_var($category, FILTER_SANITIZE_STRING);
	$brand = filter_var($brand, FILTER_SANITIZE_STRING);
	$price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$stock = filter_var($stock, FILTER_SANITIZE_NUMBER_INT);
	$description = filter_var($description, FILTER_SANITIZE_STRING);

	// Validate input data
	$errors = array();

	// Check for similar product name in database
	$sql = "SELECT * FROM product WHERE ProductName LIKE '%$prodname%'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		$errors[] = "Product name not suitable";
	}

	// Validate colorway
	$colors = array("red", "green", "blue", "yellow", "orange", "purple", "pink", "black", "white", "gray", "brown");
	if (!in_array(strtolower($colourway), $colors)) {
		$errors[] = "Invalid colorway format.";
	}

	// Validate category
	$allowed_categories = array("shoes", "mens clothes", "womens clothes", "kids clothes", "mens accessories", "womens accessories", "kids accessories");
	if (!in_array(strtolower($category), $allowed_categories)) {
		$errors[] = "Invalid category.";
	}

	// Validate brand
	$sql = "SELECT * FROM product WHERE ProductBrand LIKE '%$brand%'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		$errors[] = "Incorrect Brand";
	}

	// Validate price
	if (!preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $price)) {
		$errors[] = "Invalid price format.";
	}

	// Validate stock
	if (!is_numeric($stock)) {
		$errors[] = "Invalid stock format.";
	}

	// Validate description
	if (strlen($description) > 500) {
		$errors[] = "Description cannot be longer than 500 characters.";
	}

	// Verify that inputs are valid
	if (empty($prodname) || empty($colourway) || empty($category) || empty($brand) || empty($price) || empty($stock) || empty($description)) {
		$errors[] = "All fields are required.";
	}


    // Output errors, if any
    if (count($errors) > 0) {
        // Concatenate all the error messages into a string
        $errorString = implode("<br>", $errors);
		header("location: index.php?error=" . urlencode($errorString));
        exit();
    }else {
		//Insert the data into the database
		$sql = "INSERT INTO product (ProductCategory, ProductBrand, ProductPrice, ProductName, Description, Colourway, AvailableStock, ImgLink) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssdsssds", $category, $brand, $price, $prodname, $description, $colourway, $stock, $filePath);

		if ($stmt->execute()) {
			echo "<script>alert('Product added successfully.');</script>";
			header("Location: index.php");

		    //making file directory

		    // Construct the file path for this file based on the selected category, product name, colorway, and filename
			$filePath = "../img/";

			// Determine the appropriate subdirectory for the selected category
			if ($category === "Mens clothes" || $category === "Womens clothes" || $category === "Kids clothes") {
				$filePath .= "clothes/";
			} else if ($category === "Mens accessories" || $category === "Womens accessories" || $category === "Kids accessories") {
				$filePath .= "accessories/";
			} else if ($category === "Shoes") {
				$filePath .= "shoes/";
			}

			// Determine the appropriate subdirectory for the selected gender and add it to the file path
			if ($category === "Mens clothes" || $category === "Mens accessories") {
				$filePath .= "Mens/";
			} else if ($category === "Womens clothes" || $category === "Womens accessories") {
				$filePath .= "Womens/";
			} else if ($category === "Kids clothes" || $category === "Kids accessories") {
				$filePath .= "Kids/";
			}

			// Add the product name and colorway to the file path
			$filePath .= "$brand/$prodname/$colourway/";

			// Create the directory if it doesn't exist
			if (!file_exists($filePath)) {
				mkdir($filePath, 0777, true);
			}else{
				//echo "<script>alert('Directory already exists!');</script>";
			}

			//exits script
			exit();
	
		} else {
			$error = "Error adding product: " . $stmt->error;
			header("Location: index.php?error=" . urlencode($error));
			exit();
		}

		$stmt->close();
	}
}


if (isset($_POST["submit"])) {
	newprod();
}

?>