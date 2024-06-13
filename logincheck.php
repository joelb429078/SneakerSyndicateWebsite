<?php

if (isset($_POST["submit"])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdrepeat = $_POST['pwdrepeat'];

	require_once 'connect.php';
	require_once 'inputverificationfunctions.php';

	if (emptyInputSignup($name, $surname, $email, $pwd, $pwdrepeat) !== false){
		header("location: login.php?error=emptyinput");	
		exit();
	} if (invalidEmail($email) !== false){
		header("location: login.php?error=invalidemail");	
		exit();
	} if (invalidName($name) !== false){
		header("location: login.php?error=invalidname");	
		exit();
	} if (invalidSurname($surname) !== false){
		header("location: login.php?error=invalidsurname");	
		exit();
	} if (pwdMatch($pwd, $pwdrepeat) !== false){
		header("location: login.php?error=passwordsdonotmatch");
		exit();
	}

	createUser($conn, $name, $surname, $email, $pwd);

}else{
	header("location: login.php");
}

?>