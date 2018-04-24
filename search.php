<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="stylesheet2.css"/>
    <title>Cville Foodies | Home</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" language="javascript">
      // Add restaurant to user's BucketList
      function addToBucketList(r_id) {
        $.post("bucketListAdder.php",
          { selected_r_id: r_id },
          function(data,status){
                alert(data);

        });
      }

      // Filter the results
      function filterResults(filter) {
        $.post("filter.php",
          { filter_id: filter },
          function(data,status){
                $("#results").html(data);

        });
        // $("#results").html("");
      } 

    </script>
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

  <body id="homepage">
      <div class="container" id="searchResultBar">
        <form class="searchBar" action="search.php" method="post">
            <input type="text" placeholder="Find burgers, pasta, bars.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            <!-- <button type="button" id="filterButton"><i class="dropdown">FILTER</i></button> -->
              <a href="#" class="dropdown-toggle dropdown" id="filterButton" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> FILTER <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>PRICE RANGE
                </li>
                <li><a href="javascript:filterResults(0)">$</a>
                </li>
                <li><a href="javascript:filterResults(1)">$$</a>
                </li>
                <li><a href="javascript:filterResults(2)">$$$</a>
                </li>
                <li><a href="javascript:filterResults(3)">$$$$</a>
                </li>
                <li>RATING
                </li>
                <li><a href="javascript:filterResults(4)">>=4.5</a>
                </li>
                <li><a href="javascript:filterResults(5)">>=4.0</a>
                </li>
                <li><a href="javascript:filterResults(6)">>=3.5</a>
                </li>
              </ul>
        </form>
      </div>
      <ul class="list" id="results">
        <?php
           require_once('./library.php');
           require_once('./library2.php');
           $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
           $con2 = new mysqli($SERVER, $USERNAME2, $PASSWORD2, $DATABASE);
           // Check connection
           if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
          mysqli_connect_error());
           return null;
           }
           
          if (!isset($_POST["search"]) || empty($_POST["search"])) {
            echo "<li id='no_results'> No Search Results found!</li>";
            unset($_SESSION['search']);
            exit;
          }
          $_SESSION["search"] = $_POST["search"];
           // Form the SQL query (a SELECT query)
           $sql="SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews
            FROM restaurant INNER JOIN r_category USING (r_id)
            WHERE rname
            LIKE
            '%{$_POST['search']}%' OR category = '{$_POST['search']}'";
           $result = mysqli_query($con,$sql);
           // Print the data from the table row by row
           $i = 1;
           if (mysqli_num_rows($result)==0) { 
            echo "<li id='no_results'> No Search Results found!</li>";
            unset($_SESSION['search']);
            exit;
          }

          // CREATE or REPLACE VIEW search for filtering
          $sql2 = "CREATE OR REPLACE VIEW search AS 
          SELECT DISTINCT r_id, rname, phone_num, street, price_range, rating_google, num_of_reviews 
          FROM restaurant INNER JOIN r_category USING (r_id) 
          WHERE rname 
          LIKE
            '%{$_POST['search']}%' OR category = '{$_POST['search']}' ";
          $result2 = mysqli_query($con2,$sql2);
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
      </ul>
  </body>

</html>