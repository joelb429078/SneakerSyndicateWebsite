<?php

if (isset($_POST["loginsubmit"])) { //checking if the login form was submitted

	$email = $_POST['loginemail']; //storing email from form
	$pwd =  $_POST['loginpwd']; //storing password from form

	require_once 'connect.php'; //including the file with the database connection
	require_once 'signinverificationfunctions.php'; //including the file with the sign in verification functions

	$errors = array();

	if (emptyInputLogin($email, $pwd) !== false){ //checking if the inputs are empty
		$errors[] = "Please fill in all fields.";
	} 
	
	if (invalidInputEmail($email) !== false){ //checking if email is invalid
		$errors[] = "Please enter a valid email address.";
	}

	if(empty($errors)) { //checking if there are no errors so far
		login($conn, $email, $pwd); //calling the login function with the database connection, email and password as parameters
		exit();
	}

	else{

	// If errors exist, implode them into a single message and redirect to the login page with error message
		$errorString = implode("\n", $errors); // join the error messages into a string separated by newline characters
		header("location: login.php?error=" . urlencode($errorString));
	}
}
else{
	header("location: login.php?error=unexpectederror"); //redirecting user to sign up page with unexpected error message
}

?>
