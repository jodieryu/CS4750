<?php

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
$sql="UPDATE bucketlist_item
SET eaten_at = 'T'
WHERE r_id = {$_POST['selected_r_id']} AND c_id = {$_POST['curr_user_id']}";

$result = mysqli_query($con,$sql);

?>