<?php
session_start();
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=cville_bucketlist.csv");
require_once('./library.php');

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
	echo("Can't connect to MySQL Server. Error code: " .
		mysqli_connect_error());
	return null;
}
/*echo "<script>console.log(\"hello\");</script>"
*/
$sql="SELECT *
FROM restaurant INNER JOIN bucketlist_item USING (r_id)
WHERE c_id = '{$_SESSION['c_id']}' and eaten_at = 'F'";

$result = mysqli_query($con, "$sql");
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$fp = fopen("php://output", 'w');
$header =  array('rname' => "rname", 'price_range' => "price_range", 'phone_num' => "phone_num", 'street' => "street", 'city' => "city", 'rating' => "rating");

fputcsv($fp, $header);

while($row = mysqli_fetch_array($result)) {
	$arr = array('rname' => "{$row['rname']}", 'price_range' => "{$row['price_range']}", 'phone_num' => "{$row['phone_num']}", 'street' => "{$row['street']}", 'city' => "Charlottesville", 'rating' => "{$row['rating_google']}/5");
	             // print json_encode($row);
	fputcsv($fp, $arr);
}

fclose($fp);
mysqli_close($con);

?>