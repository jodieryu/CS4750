<?php
session_start();
// Check if user is logged in. Otherwise, stop them from adding to nonexistant bucketlist.
if(!isset($_SESSION["c_id"])) {
  echo "You are not logged in. Please log in to add to your BucketList!";
  exit();
}

if (!isset($_POST['selected_r_id'])) {
	header("Location: ./");
	exit();
}

// Connect to DB
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
	echo("Can't connect to MySQL Server. Error code: " .
	mysqli_connect_error());
	return null;
}

// Form the SQL query (a SELECT query)
$sql="SELECT r_id
FROM bucketlist_item
WHERE r_id = '{$_POST['selected_r_id']}'";

$result = mysqli_query($con,$sql);

// If the user already added this restaurant, notify them
// Otherwise add the restaurant to their bucketlist
if (mysqli_num_rows($result) != 0) { 
	echo "You have already added this restaurant to your BucketList!";
	exit();
} else {
	$c_id = (int) $_SESSION["c_id"];
	$bl_name = "BucketList";
	$r_id = (int) $_POST['selected_r_id'];
	$sql="INSERT INTO bucketlist_item (c_id, r_id)
        VALUES ($c_id, $r_id)";
	$result = mysqli_query($con,$sql);
	echo "Restaurant has been added to your BucketList!";
	exit();
}

?>