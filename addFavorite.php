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

// Form the SQL query (an INSERT query)
$sql="INSERT INTO favorite (c_id, r_id)
        VALUES ({$_POST['curr_user_id']}, {$_POST['selected_r_id']})";

$result = mysqli_query($con,$sql);

?>