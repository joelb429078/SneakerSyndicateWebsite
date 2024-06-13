<?php

function useraddressupdate(){
    // Start the session
    session_start();

    // Connect to the baskets database
    require_once 'connect.php';
    //establishing $userID based upon session stored user ID variable
    $userID = $_SESSION["SessionUserID"];


    $housenum = filter_input(INPUT_POST, 'housenum', FILTER_SANITIZE_NUMBER_INT);
    $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);

    $errors = [];

    // Validate housenum
    if (empty($housenum) || !is_numeric($housenum)) {
        $errors[] = "Error: House number must be a numeric value";
    }

    // Validate street
    if (empty($street) || !preg_match("/^[A-Za-z- ]+$/", $street)) {
        $errors[] = "Error: Invalid street format. Only letters and '-' allowed";
    }

    // Validate city
    if (empty($city) || !preg_match("/^[A-Za-z- ]+$/", $city)) {
        $errors[] = "Error: Invalid city format. Only letters and '-' allowed";
    }

    // Validate county
    if (empty($county) || !preg_match("/^[A-Za-z- ]+$/", $county)) {
        $errors[] = "Error: Invalid county format. Only letters and '-' allowed";
    }

    // Validate postcode
    if (empty($postcode) || !preg_match("/^[A-Za-z0-9\s]{3,10}$/", $postcode)) {
        $errors[] = "Error: Invalid postcode format";
    }

    // Output errors, if any
    if (count($errors) > 0) {
        // Concatenate all the error messages into a string
        $errorString = implode("<br>", $errors);
        header("location: userarea.php?error=" . urlencode($errorString));
        exit();
    }

    // concatenate address fields
    $addressline1 = $housenum . ' ' . $street;
    $addressline2 = $city . ', ' . $county;

    // prepare SQL statement
    $sql = "UPDATE users SET AddressLine1 = ?, AddressLine2 = ?, Postcode = ? WHERE UserID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $addressline1, $addressline2, $postcode, $userID);
    mysqli_stmt_execute($stmt);
    // bind parameters and execute statement
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Record updated successfully')</script>";
        header("Location: userarea.php?");
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "')</script>";
        header("Location: userarea.php?");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

if (isset($_POST['submit'])) { // actives address update function if the user has pressed the related button
    useraddressupdate();
}

?>
