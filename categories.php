<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>Cville Foodies | Categories</title>

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
      <li class="nav-item">
        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Categories</a>
      </li>
    </ul>

    <?php include 'loginHeader.php'; ?>
    
  </div>
</nav>

  <body id="categoriesPage">
    <div class="container">
      <div class=categoriesHeader >
        <h1> Categories &amp; Cuisines </h1>
      </div>
     
     <div class="categoryItems">
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('American');">
            <img src="./images/americanCuisine.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Chinese');">
            <img src="./images/chineseCuisine.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Fast-food');">
            <img src="./images/Fastfood.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Indian');">
            <img src="./images/indianCuisine.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Pizza');">
            <img src="./images/pizza.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Salad');">
            <img src="./images/salads.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('sandwiches');">
            <img src="./images/sandwiches.png">
          </a>
        </div>
        <div class="category">
          <a href="javascript:;" onclick="selectedCategory('Thai');">
            <img src="./images/thaiCuisine.png">
          </a>
        </div>

      </div>

    </div>

     <form class="category" action="search.php" method="post" style = "visibility: hidden"  id="categoryForm">
            <input type="text" placeholder="Find burgers, pasta, bars.." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
    </form>



    <script>
      function selectedCategory(category){
        document.getElementById("search").value=category;
        document.getElementById("categoryForm").submit();
        /*var search = category;
        $.post('search2.php', {variable: search});*/
      }
    </script>
  </body>



</html>