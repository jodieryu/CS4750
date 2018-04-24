<?php
session_start();

if (!isset($_POST['filter_id'])) {
	header("Location: ./");
	exit();
}

if (!isset($_SESSION['search'])) {
	echo "Nothing to filter!";
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

$filter_id = $_POST['filter_id'];

if ($filter_id == 0) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE price_range = '$'";
} else if ($filter_id == 1) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE price_range = '$$'";
} else if ($filter_id == 2) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE price_range = '$$$'";
} else if ($filter_id == 3) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE price_range = '$$$$'";
} else if ($filter_id == 4) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE rating_google >= 4.5";
} else if ($filter_id == 5) {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE rating_google >= 4.0";
} else {
	$sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM search
            WHERE rating_google >= 3.5";
}

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result)==0) { 
	echo "<li id='no_results'> No Search Results found from filter!</li>";
	exit;
}

$i = 1;
while($row = mysqli_fetch_array($result)) {
	$r_name = urlencode($row['rname']);
	$tableRow = "<li>
	  <div class=\"outerDiv\">
	    <div class=\"leftCol\">
	      <h2 class=\"rName\" onclick=\"window.location.href='restaurant.php?r={$r_name}'\" style=\"cursor:pointer;\">$i. {$row['rname']}</h2>
	      <p class=\"rInfo\"><span class=\"rCost\">{$row['price_range']}</span> <span class=\"rRating\"> {$row['rating_google']} / 5</span></p>
	    </div>
	    <div class=\"rightCol\">
	      <p>{$row['street']}, Charlottesville, VA</p>
	      <p>{$row['phone_num']}</p>
	    </div>
	    <div class=\"mostrightCol\">
	      <button id=\"{$row['r_id']}\" onclick='addToBucketList(\"{$row['r_id']}\");' class=\"btn btn-outline-success\">Add to BucketList!</button>
	    </div>
	  </div>
	</li>";
	 echo $tableRow;
	 $i++;
	}

mysqli_close($con);

?>