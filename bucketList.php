  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>Cville Foodies | BucketList</title>

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
      function addToBucketList(r_id, c_id) {
          // set eaten_at to T in the DB
          $.post("addVisit.php",
            { selected_r_id: r_id, 
              curr_user_id: c_id},
              function(data,status){
              // alert(data);
            });
          // set the button as visited
          document.getElementById(r_id).onclick = function() { alert("Restaurant has already been visited!"); }
          document.getElementById(r_id).classList.remove('btn-outline-primary');
          document.getElementById(r_id).classList.add('btn-success');
          document.getElementById(r_id).classList.add('disabled');
          document.getElementById(r_id).innerText = "Restaurant Visited!";
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
          WHERE c_id = '{$_SESSION['c_id']}' and eaten_at = 'F'";
          $result = mysqli_query($con,$sql);

          if (mysqli_num_rows($result)==0) { 
            echo "<br/><p style='text-align:center'> No items in your BucketList! </p>";
            exit;
          }
          $i = 1;
          while($row = mysqli_fetch_array($result)) {
            $tableRow = "
            <div class=\"bucketListItem\">
            <h3> $i. {$row['rname']} ({$row['price_range']})</h3> <button id=\"{$row['r_id']}\" onclick='addToBucketList(\"{$row['r_id']}\", \"{$row['c_id']}\");' class=\"btn btn-outline-primary\">Visit the Restaurant</button>
            <p> <b>Phone #:</b> {$row['phone_num']} <b>Address:</b> {$row['street']}, Charlottesville, VA<br/> <b>Rating:</b> {$row['rating_google']}/5.0 </p>
            </div>";
            echo $tableRow;
            $i++;
          }

            echo " <div class=\"bucketlist_item\">
            <h3 style=\"padding-bottom:25px;\">
            <button class=\"btn btn-outline-primary\" onclick=\"window.location.href='downloadCSV.php'\">Download CSV</button>
            </h3>
            </div> ";

            mysqli_close($con);
            ?> 
          </div>
        </div>


      </body>

      <footer> &copy; Copyright 2018 - Katherine Qian, Jodie Ryu, Youbeen Shim, Joshua Ya. All rights reserved.
        </html>