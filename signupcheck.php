<?php

if (isset($_POST["submit"])) { //checking if the sign up form was submitted

	$name = $_POST['name']; //storing name from form
	$surname = $_POST['surname']; //storing surname from form
	$email = $_POST['email']; //storing email from form
	$pwd = $_POST['pwd']; //storing password from form
	$pwdrepeat = $_POST['pwdrepeat']; //storing repeated password from form

	require_once 'connect.php'; //including the file with the database connection
	require_once 'signupverificationfunctions.php'; //including the file with the sign up verification functions

	$errors = array();

	if (emptyInputSignup($name, $surname, $email, $pwd, $pwdrepeat) !== false) { //checking if any of the inputs are empty
		$errors[] = "One or more input fields are empty";
	}

	if (invalidEmail($email) !== false) { //checking if email is invalid
		$errors[] = "Invalid email address";
	}

	if (invalidName($name) !== false) { //checking if name is invalid
		$errors[] = "Invalid name";
	}

	if (invalidSurname($surname) !== false) { //checking if surname is invalid
		$errors[] = "Invalid surname";
	}

	if (pwdMatch($pwd, $pwdrepeat) !== false) { //checking if passwords match
		$errors[] = "Passwords do not match";
	}

	if (count($errors) === 0) {
		createUser($conn, $name, $surname, $email, $pwd); //calling the create user function with the database connection, name, surname, email and password as parameters
		exit();
	} else {
		$errorString = implode("\n", $errors); // join the error messages into a string separated by newline characters
		header("location: login.php?error=" . urlencode($errorString));
		exit();
	}


}else{
	header("location: login.php"); //redirecting user to sign up page
}

?>