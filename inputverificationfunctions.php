<?php

/*    
            SIGN-UP PART
 */

function emptyInputSignup($name, $surname, $email, $pwd, $pwdrepeat){ //passing through variables for checking to see if empty
	$result;
	if (empty($name) || empty($email) || empty($surname) || empty($pwd) || empty($pwdrepeat)){
		$result = true; //returns true prompting an error 
	} else{
		$result= false; //else returns false as empty fields found
	}
	return $result;
}

function invalidName($name){
	$result;
	if (!preg_match("/^[a-zA-Z]*$/", $name)){ //checkign to see if the name contains only letters 
		$result = true; //returns true prompting an error 
	} else {
		$result = false; //else returns false
	}
	return $result;
}

function invalidSurname($surname){
	$result;
	if (!preg_match("/^[a-zA-Z]*$/", $surname)){ //checkign to see if the name contains only letters 
		$result = true; //returns true prompting an error 
	} else {
		$result = false; //else returns false
	}
	return $result;
}

function invalidEmail($email){ //email check
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //makes sure that email follows desired format
		$result = true; //returns true prompting an error 
	} else{
		$result = false; //else returns false
	}
	return $result;
}

function pwdMatch($pwd, $pwdrepeat){
	$result;
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


/*
   LOGIN PART
*/

function emptyInputLogin($loginattemptemail, $loginattemptpwd){ //passing through variables for checking to see if empty
	$result;
	if (empty($loginattemptemail) || empty($loginattemptpwd)){
		$result = true; //returns true prompting an error 
	} else{
		$result= false; //else returns false as empty fields found
	}
	return $result;
}

function invalidInputEmail($loginattemptemail){ //email check
	$result;
	if (!filter_var($loginattemptemail, FILTER_VALIDATE_EMAIL)){ //makes sure that email follows desired format
		$result = true; //returns true prompting an error 
	} else{
		$result = false; //else returns false
	}
	return $result;
}

function loginUser($conn, $loginattemptemail, $loginattemptpwd){

	//generate login stuff
	$sql = "SELECT * FROM users WHERE Email ='$loginattemptemail' AND Password = '$loginattemptpwd'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1){
		$row = mysqli_fetch_assoc($result);

		//converting password back into regular 
		$pwdhashed = $row["Password"];
		$checkpwd = password_verify($loginattemptpwd, $pwdhashed);
		
		if ($row['Email'] === $loginattemptemail && $checkpwd === true){
			session_start();
			$_SESSION["SessionUserID"] = $row["UserID"]; // establishing a session ID
			$Admincheck = $row["AdminAccess"];
			if ( $Admincheck == 0){
				header("Location: DASHBOARD/index.php?admingrantedaccess=true");
				exit();
			}else if ($Admincheck == 0){
				header("Location: userarea.php?userid=");
				exit();
			}else{
				echo "Could not aunthenicate user details.";
			}

		}else if  ($checkpwd === false){
			header("Location: login.php?/error=passwordincorrect");
			exit();
		}			
	}
}
?>