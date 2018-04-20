<?php
session_start();

if (!isset($_SESSION["c_id"])) {
	$rows = array();
	print json_encode($rows);
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
$sql="SELECT *
FROM achievements
WHERE c_id = {$_SESSION['c_id']}";

$result = mysqli_query($con,$sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);

?>