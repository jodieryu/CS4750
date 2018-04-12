<?php
session_start();
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
           // Check connection
if (mysqli_connect_errno()) {
	echo("Can't connect to MySQL Server. Error code: " .
		mysqli_connect_error());
	return null;
}


$formUsername = "form-username";
$formPassword = "form-password";

// Query the DB
$sql="SELECT *
        FROM customer
        WHERE username='{$_POST[$formUsername]}'";
$result = mysqli_query($con,$sql);

// If a user is found and the password is correct, log in and go to homepage
// Otherwise, return to the login page
if (mysqli_num_rows($result)!= 0) {
	$row = mysqli_fetch_array($result);
	if(password_verify($_POST["form-password"], $row["pwd"])) {
	    header("Location: ./");
	    exit();
	} 
} 

$_SESSION["badSignIn"] = true;
header("Location: login.php");
exit();


?>