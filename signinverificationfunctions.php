<?php

function emptyInputLogin($email, $pwd){ //passing through variables for checking to see if empty
	$result;
	if (empty($email) || empty($pwd)){
		$result = true; //returns true prompting an error 
	} else{
		$result= false; //else returns false as empty fields found
	}
	return $result;
}

function invalidInputEmail($email){ //email check
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //makes sure that email follows desired format
		$result = true; //returns true prompting an error 
	} else{
		$result = false; //else returns false
	}
	return $result;
}

function login($conn, $email, $pwd) {
    // Fetch the user with the specified email address
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE Email='$email'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        // Compare the password hash with the input password
        $pwdhashed = $row["Password"];
        $checkpwd = password_verify($pwd, $pwdhashed);
        if ($checkpwd) {
            session_start();
            $_SESSION["SessionUserID"] = $row["UserID"]; // Stores the userid as part of session 
            $Admincheck = $row["AdminAccess"]; //checks to see if the user is a 
            $_SESSION['cart'] = array(); //creating a cart array for storing cart items as part of local storage 
            if ($Admincheck == 1) {
                header("Location: DASHBOARD/index.php?admingrantedaccess=true");// if the user is an admin they get redirected to the admin dashboard
                exit();
            } else if ($Admincheck == 0) { //otherwise all regular users are redirected to the userarea page 
                header("Location: userarea.php?");
                exit();
            } else {
                echo "Could not authenticate user details."; //if some other unforseen error occurs this error message is displayed 
            }
        } else {
            header("Location: login.php?error=PasswordIncorrect"); // else if the users 
            exit();
        }
    } else {
        header("Location: login.php?error=UnknownUser");
        exit();
    }
}
?>