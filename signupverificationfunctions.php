<?php

/*    
            SIGN-UP PART
 */

function emptyInputSignup($name, $surname, $email, $pwd, $pwdrepeat){ //passing through variables for checking to see if empty
	$result = false;
	if (empty($name) || empty($email) || empty($surname) || empty($pwd) || empty($pwdrepeat)){
		$result = true; //returns true prompting an error 
	} else{
		$result= false; //else returns false as empty fields found
	}
	return $result;
}

function invalidName($name){
	$result = true;
	if (!preg_match("/^[a-zA-Z]*$/", $name)){ //checkign to see if the name contains only letters 
		$result = true; //returns true prompting an error 
	} else {
		$result = false; //else returns false
	}
	return $result;
}

function invalidSurname($surname){
	$result = true;
	if (!preg_match("/^[a-zA-Z]*$/", $surname)){ //checkign to see if the name contains only letters 
		$result = true; //returns true prompting an error 
	} else {
		$result = false; //else returns false
	}
	return $result;
}

function invalidEmail($email){ //email check
	$result = true;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //makes sure that email follows desired format
		$result = true; //returns true prompting an error 
	} else{
		$result = false; //else returns false
	}
	return $result;
}

function pwdMatch($pwd, $pwdrepeat){
	$result = true;
	if($pwd !== $pwdrepeat){ //checking to see if they do not equal eachither 
		$result = true;//returns true prompting an error 
	}
	else{
		$result = false;//else returns false
	}
	return $result;
}

function createUser($conn, $name, $surname, $email, $pwd){ //now onto creating user function
	$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT); //using dynamic inbuit php hashing algorithmn  
	$sql = "INSERT INTO users (FirstName, Surname, Email, Password) VALUES ('$name', '$surname', '$email', '$hashedpwd');"; //passing all data through 	
	$stmt = mysqli_stmt_init($conn); // establishing connection using prior established $conn 
	if (!mysqli_stmt_prepare($stmt, $sql)){ //preparing the query
		header("location: login.php?error=stmtfailed=issue=" . mysqli_error($conn)); // if fails header will change alerting the user of this issue 
		exit();
	}
	
	mysqli_stmt_execute($stmt); //data will be entered into database
	mysqli_stmt_close($stmt); //closing connection 

	header("location: login.php?signup=successful");
	exit();
}

?>