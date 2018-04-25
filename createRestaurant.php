<?php
session_start();
if(!isset($_SESSION["admin"])) {
  header("Location: ./");
  exit();
}

if (!isset($_POST["rName"]) || empty($_POST["rName"]) || !isset($_POST["rNum"]) || empty($_POST["rNum"]) ||
	!isset($_POST["rStreet"]) || empty($_POST["rStreet"]) || !isset($_POST["rPrice"]) || empty($_POST["rPrice"])
	|| !isset($_POST["rRating"]) || empty($_POST["rRating"])) {
	echo "One or more fields are empty or missing!";
	exit;
}

require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno()) {
	echo("Can't connect to MySQL Server. Error code: " .
	mysqli_connect_error());
	return null;
}

$sql="INSERT INTO restaurant (rname, phone_num, street, price_range, rating_google) VALUES
('{$_POST['rName']}', '{$_POST['rNum']}', '{$_POST['rStreet']}', '{$_POST['rPrice']}', {$_POST['rRating']})";
$result = mysqli_query($con,$sql);

$sql2="SELECT LAST_INSERT_ID()";
$result2 = mysqli_query($con,$sql2);

$row = mysqli_fetch_array($result2);
$address[] = $row;
// echo $address[0][0];

$sql3="INSERT INTO r_category (r_id, category) VALUES
({$address[0][0]}, 'None')";
$result3 = mysqli_query($con,$sql3);


echo "Restaurant created!";
mysqli_close($con);

?>