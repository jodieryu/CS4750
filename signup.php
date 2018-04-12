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

// Put all of the field names in an array
$fields=array("form-first-name","form-last-name","form-street","form-city","form-state","form-username","form-password");

// Check to see if any field is not set or empty
// If not the case, set the fieldsSet to false and go back to login.html
foreach($fields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
		$_SESSION["empty"] = true;
		header("Location: login.php");
		exit();
	}
}

// Check to see if the username already exists
$sql="SELECT username
        FROM customer
        WHERE username='{$_POST[$fields[5]]}'";
$result = mysqli_query($con,$sql);

// If the username exists, go back to login
if (mysqli_num_rows($result)!= 0) {
	$_SESSION["taken"] = true;
	header("Location: login.php");
    exit();
} else {
	// Otherwise, insert the new user into the database
	$hashed_password = password_hash($_POST['form-password'], PASSWORD_DEFAULT); // Hash the password
	$sql="INSERT INTO customer (fname, lname, street, city, state, username, pwd)
        VALUES ('{$_POST[$fields[0]]}', '{$_POST[$fields[1]]}', '{$_POST[$fields[2]]}', '{$_POST[$fields[3]]}',
        '{$_POST[$fields[4]]}', '{$_POST[$fields[5]]}', '{$hashed_password}')";
	$result = mysqli_query($con,$sql);
	$_SESSION["successful"] = true;
	header("Location: login.php");
	exit();
}


?>