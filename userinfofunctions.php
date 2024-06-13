<?php

function userinfoupdate(){
    // Start the session
    session_start();

    // Connect to the baskets database
    require_once 'connect.php';
    // Check if the form has been submitted
    // Get the input values
    // Validate and sanitize user inputs
    $fullName = trim($_POST['fullName']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['pass']);

    // Define validation rules
    $fullNameRegex = "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/"; // Allows letters, spaces, hyphens, apostrophes, and periods
    $emailRegex = "/^\S+@\S+\.\S+$/"; // Matches a standard email address format
    $passwordRegex = "/^(?=.*[A-Za-z])(?=.*\\d)[A-Za-z\\d@]{4,}$/";
    // Requires at least 4 characters with at least one letter and one number,
    // and allows for an optional "@" symbol in the character set.

    // Initialize the $errors array
    $errors = array();

    // Verify that inputs match validation rules
    if (!empty($fullName)){ //checking to see if fullname variable is populated 
        if (!preg_match($fullNameRegex, $fullName)) {
            $errors[] = "Invalid full name format.";
        }
    }
 
    if (!empty($email)){ //checking to see if email variable is populated 
        if (!preg_match($emailRegex, $email)) {
            $errors[] = "Invalid email address format.";
        }
    }

    if (!empty($password)){ //checking to see if password variable is populated 
        if (!preg_match($passwordRegex, $password)) {
            $errors[] = "Password must be at least 4 characters and contain at least one letter and one number.";
        }
    }

    if (empty($fullName) && empty($email) && empty($password)){ //checking to see if all variables are populated and empty  
        $errors[] = "Atleast change one input before submitting.";
    }

    // Check if there are any errors
    if (count($errors) > 0) {
        // Concatenate all the error messages into a string
        $errorString = implode("<br>", $errors);
        header("location: userarea.php?error=" . urlencode($errorString));
        exit();
    }

    // Get the current user information from the databases
    $userID = $_SESSION["SessionUserID"];
    $sql = "SELECT * FROM users WHERE UserID = $userID";
    $result = mysqli_query($conn, $sql);
    $userInfo = mysqli_fetch_assoc($result);

    // Split full name into first name and surname
    $fullNameArray = explode(' ', $fullName);
    $firstName = $fullNameArray[0];
    $surname = isset($fullNameArray[1]) ? $fullNameArray[1] : '';

    // Check if the input has changed
    if (!empty($firstName) && $firstName != $userInfo["FirstName"]) {
        $sqlUpdate .= "FirstName = '$firstName', ";
    }
    if (!empty($surname) && $surname != $userInfo["Surname"]) {
        $sqlUpdate .= "Surname = '$surname', ";
    }
    if (!empty($email) && $email != $userInfo["Email"]) {
        $sqlUpdate .= "Email = '$email', ";
    }
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sqlUpdate .= "Password = '$passwordHash', ";
    }

    // Remove the trailing comma and space from $sqlUpdate
    $sqlUpdate = rtrim($sqlUpdate, ', ');

    // Update the database if any input has changed
    if (!empty($sqlUpdate)) {
        $sql = "UPDATE users SET $sqlUpdate WHERE UserID = $userID";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Record updated successfully')</script>";
            header("Location: userarea.php?");
        } else {
            echo "<script>alert('Error updating record: " . mysqli_error($conn) . "')</script>";
            header("Location: userarea.php?");
        }
    } else {
        echo "<script>alert('No input has changed')</script>";
        header("Location: userarea.php?");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    userinfoupdate();
}

?>
