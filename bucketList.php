<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>Cville Foodies | BucketList</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
 
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a href="./" class="pull-left">
        <img src="./images/logo.png">
    </a> 
    <a href="./" class="navbar-brand">Cville Foodies</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./categories.php">Categories</a>
      </li>
    </ul>

    <?php include 'loginHeader.php'; ?>
    
  </div>
</nav>

  <body id="bucketListPage">
    <div class="container">
      <div class=bucketListHeader></div>
      <div class="bucketListItems">
        <?php
          if(!isset($_SESSION["username"])) {
            echo "<br/><p style='text-align:center'> You are not logged in! Please log in to see your BucketList! </p>";
            exit();
          }
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
          FROM restaurant INNER JOIN bucketlist_item USING (r_id)
          WHERE c_id = '{$_SESSION['c_id']}'";
          $result = mysqli_query($con,$sql);

          if (mysqli_num_rows($result)==0) { 
            echo "<li> No Search Results found!</li>";
            exit;
          }
          $i = 1;
          while($row = mysqli_fetch_array($result)) {
            $tableRow = "
            <div class=\"bucketListItem\">
              <h3> $i. {$row['rname']} ({$row['price_range']})</h3> <button class=\"btn btn-outline-success\">Visit the Restaurant</button>
              <p> <b>Phone #:</b> {$row['phone_num']} <b>Address:</b> {$row['street']}, Charlottesville, VA<br/> <b>Rating:</b> {$row['rating_google']}/5.0 </p>
            </div>";
            echo $tableRow;
            $i++;
           }

          mysqli_close($con);
        ?> 
      </div>
    </div>
  </body>

<footer> &copy; Copyright 2018 - Katherine Qian, Jodie Ryu, Youbeen Shim, Joshua Ya. All rights reserved.
</html>