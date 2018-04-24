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
      function addToBucketList(r_id) {
        $.post("bucketListAdder.php",
          { selected_r_id: r_id },
          function(data,status){
                alert(data);

        });
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

      <ul class="list">
        <?php
           $rname = $_GET["r"] ;
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
            FROM restaurant LEFT JOIN r_hours USING (r_id)
            WHERE rname = '{$rname}'";
           $result = mysqli_query($con,$sql);

           if (mysqli_num_rows($result)!= 0) {
            $row = mysqli_fetch_array($result);
            $tableRow = "<li>
              <div class=\"outerDiv\">
                <div class=\"mostrightCol\">
                  <button id=\"{$row['r_id']}\" onclick='addToBucketList(\"{$row['r_id']}\");' class=\"btn btn-outline-success\">Add to BucketList!</button>
                </div>
                <div class=\"leftCol\">
                  <h2 class=\"rName\" onclick=\"window.location.href='restaurant.php?r={$row['rname']}'\">{$row['rname']}</h2>
                  <p class=\"rInfo\"><span class=\"rCost\">{$row['price_range']}</span> <span class=\"rRating\"> {$row['rating_google']} / 5</span></p>
                </div>
                <div class=\"rightCol\">
                  <p>{$row['street']}, Charlottesville, VA</p>
                  <p>{$row['phone_num']}</p>
                </div>
                <div class=\"leftColFull\">
                  <p class=\"rHours\">Sunday Hours: {$row['sun_open_time']} - {$row['sun_close_time']}</p>
                  <p class=\"rHours\">Monday Hours: {$row['mon_open_time']} - {$row['mon_close_time']}</p>
                  <p class=\"rHours\">Tuesday Hours: {$row['tues_open_time']} - {$row['tues_close_time']}</p>
                  <p class=\"rHours\">Wednesday Hours: {$row['wed_open_time']} - {$row['wed_close_time']}</p>
                  <p class=\"rHours\">Thursday Hours: {$row['thurs_open_time']} - {$row['thurs_close_time']}</p>
                  <p class=\"rHours\">Friday Hours: {$row['fri_open_time']} - {$row['fri_close_time']}</p>
                  <p class=\"rHours\">Saturday Hours: {$row['sat_open_time']} - {$row['sat_close_time']}</p>    
                </div>
              </div>
            </li>";
             echo $tableRow;
          } 


          $sql2="SELECT *
            FROM restaurant INNER JOIN menu USING (r_id) /*INNER JOIN provide USING (r_id) INNER JOIN supplier USING (s_id)*/
            WHERE rname = '{$rname}' ORDER BY category, price ASC";
          $result2 = mysqli_query($con,$sql2);

          $i = 1;
          if (mysqli_num_rows($result2)==0) { 
            echo "<li><div class=\"outerDiv\">
                <div class=\"leftCol\">
                  <p class=\"rName\">MENU</p>
                  <p class=\"rName\">No menu to display :(</p>
                </div>
                </div>
                </li>";
          }

          if (mysqli_num_rows($result2)>0) { 
            echo "<rli>
              <div class=\"outerDiv\">
                <div class=\"leftCol\">
                  <h2>MENU</h2>
                </div>
              </div>
            </rli>";
          }
           while($row = mysqli_fetch_array($result2)) {
            $tableRow = "<rli> <hr>
              <div class=\"outerDiv\">
                 <div class=\"mostrightCol\">
                  <p class=\"rItem\">{$row['price']}</p>
                </div>
                <div class=\"leftCol\">
                  <p class=\"rItem\">$i.  {$row['food_name']} ({$row['category']})</p>
                </div>
                <div class=\"leftColFull\">
                  <p class=\"rItem\">{$row['description']}</p>
                </div>
              </div> 
            </rli>";
             echo $tableRow;
             $i++;
           }

          $sql3="SELECT *
          FROM restaurant INNER JOIN provide USING (r_id) INNER JOIN supplier USING (s_id)
          WHERE rname = '{$rname}'";
          $result3 = mysqli_query($con,$sql3);

          $i = 1;
          if (mysqli_num_rows($result3)==0) { 
            echo "<li><div class=\"outerDiv\">
                <div class=\"leftCol\">
                  <h2 class=\"rName\">SUPPLIERS</h2>
                  <h2 class=\"rName\">No listed suppliers :(</h2>
                </div>
                </div>
                </li>";
          }

          if (mysqli_num_rows($result3)>0) { 
            echo "<li>
              <div class=\"outerDiv\">
                <div class=\"leftCol\">
                  <h2 class=\"rName\">SUPPLIERS</h2>
                </div>
                </div>

            </li>";
          }
           while($row = mysqli_fetch_array($result3)) {
            $tableRow = "<rli> <hr>
                  <div class=\"outerDiv\">
                  <div class=\"leftCol\">
                  <p class=\"rName\">$i.  {$row['sname']}: {$row['item']}</p>
                </div>
                <div class=\"mostrightCol\">
                  <p>{$row['street']}, {$row['city']}, {$row['state']}</p>
                </div>
                </div>
            </rli>";
             echo $tableRow;
             $i++;
           }


           mysqli_close($con);
        ?> 
      </ul>
  </body>

</html>   