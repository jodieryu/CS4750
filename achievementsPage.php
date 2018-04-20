<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>Cville Foodies | Your Achievements</title>

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
      function checkBadges() {
        // get user's achievements
        $.get("checkAchievements.php",
          function(data,status){
            var jsonData = JSON.parse(data);
            if (jQuery.isEmptyObject(jsonData)) {
              alert("You are not logged in! Please log in to see your Achievements!");
              return;
            }
            var badges = jsonData[0];
            // Unfade if user has badge
            if (badges["r1"] == 'T') document.getElementById("oneVisited").classList.remove('badgeFaded');
            if (badges["r5"] == 'T') document.getElementById("fiveVisited").classList.remove('badgeFaded');
            if (badges["r10"] == 'T') document.getElementById("tenVisited").classList.remove('badgeFaded');
            if (badges["r100"] == 'T') document.getElementById("hundredVisited").classList.remove('badgeFaded');
            if (badges["bl1"] == 'T') document.getElementById("oneAdded").classList.remove('badgeFaded');
            if (badges["bl5"] == 'T') document.getElementById("fiveAdded").classList.remove('badgeFaded');
            if (badges["bl10"] == 'T') document.getElementById("tenAdded").classList.remove('badgeFaded');
            if (badges["bl100"] == 'T') document.getElementById("hundredAdded").classList.remove('badgeFaded');
        });
      }

      checkBadges();
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

<body id="achievementsPage">
    <div class="container">
      <div class=achievementsHeader></div>
      <div class="badgesContainer">
      	<center><h2>Badges for Visiting </h2></center>
      	<div class="badgesForVisitingRow">
      		<div class="badgeForVisiting badgeFaded" id="oneVisited" >
      			<!--badge for visiting 1 restaurant-->
      			<center><img src="./images/gold-medal.png">
      				<h5>1 Restaurant Visited!</h5>
      				<p>You've earned this badge from visiting one restaurant in Charlottesville. Nice!</p>
      			</center>
      		</div>
      		<div class="badgeForVisiting badgeFaded" id="fiveVisited">
      			<center><img src="./images/fivestars.png">
      				<h5>5 Restaurants Visited!</h5>
      				<p>Looks like you've checked out five restaurants nearby. Awesome!</p>
      			</center>
      		</div>
      		<div class="badgeForVisiting badgeFaded" id="tenVisited">
      			<center><img src="./images/shield.png">
      				<h5>10 Restaurants Visited!</h5>
      				<p>Wow! You've ate at ten restaurants now! Keep tackling those restaurants.</p>
      			</center>
      		</div>
      		<div class="badgeForVisiting badgeFaded" id="hundredVisited">
      			<center><img src="./images/crown.png">
      				<h5>100 Restaurants Visited!</h5>
      				<p>Look at you! You're on fire. You've found 100 restaurants to try out.</p>
      			</center>
      		</div>
      	</div>

      	<div class="badgesForAddingRow">
      		<center><h2>Badges for Adding to Your BucketList </h2></center>
      		<!--badge for adding 1 restaurant-->
      		<div class="badgeForAdding badgeFaded" id="oneAdded">
      			<center><img src="./images/gold-medal.png">
      				<h5>1 Restaurant Added!</h5>
      				<p> You've earned this badge from adding one restaurant to your bucketlist. Cool!</p>
      			</center>
      		</div>
      		<!--badge for adding 5 restaurants-->
      		<div class="badgeForAdding badgeFaded" id="fiveAdded">
      			<center><img src="./images/fiveAdded.png">
      				<h5>5 Restaurant Added!</h5>
      				<p> You're an ethnic explorer! You've added five different restaurants to your bucketlist.</p>
      			</center>
      		</div>
      		<!--badge for adding 10 restaurants-->
      		<div class="badgeForAdding badgeFaded" id="tenAdded">
      			<center><img src="./images/tenAdded.png">
      				<h5>10 Restaurant Added!</h5>
      				<p> You're on a roll! You've added ten restaurants to your bucketlist so far.</p>
      			</center>
      		</div>
      		<!--badge for adding 100 restaurants-->
      		<div class="badgeForAdding badgeFaded" id="hundredAdded">
      			<center><img src="./images/manyAdded.png">
      				<h5>100 Restaurant Added!</h5>
      				<p> You have quite the ambition! Congratulations for adding over a hundred restaurants!
      				</p>
      			</center>
      		</div>
      	</div>

      </div>
    </div>
  </body>

</html>