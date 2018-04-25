<?php
session_start();
if(!isset($_SESSION["admin"])) {
  header("Location: ./");
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <title>Cville Foodies | Home</title>

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
      // logout of admin account
      function clickLogout() {
        document.getElementById("logoutForm").submit();
      }

      // add restaurant to restaurant table
      function createRestaurant() {
        var restaurantName = document.getElementById('restaurantName').value;
        var phoneNum = document.getElementById('phoneNum').value;
        var street = document.getElementById('street').value;
        var priceRange = document.getElementById('priceRange').value;
        var rating = document.getElementById('rating').value;
        $.post("createRestaurant.php",
          { rName: restaurantName,
            rNum : phoneNum,
            rStreet : street,
            rPrice : priceRange,
            rRating : rating },
          function(data,status){
                alert(data);
        });
      }

    </script>
  </head>

  <body id="makeRestaurant">
    <div class="restaurantForm">
        <h1>Add a Restaurant</h1>
        <p> Please fill in your information for the business. </p> 
    </div>
    <div class="restaurantForm2">
        <form>
            <label>Restaurant name:</label>
                <input type="text" name="restaurantName" id="restaurantName"><br>
            <label>Phone number:</label>
                <input type="text" name="phoneNum" id="phoneNum"><br>
            <label>Street:</label>
                <input type="text" name="street" id="street"><br>
            <label>Price range:</label>
                <input type="text" name="priceRange" id="priceRange"><br>
            <label>Rating:</label>
                <input type="text" name="rating" id="rating"><br>
        </form>
    </div>
    <button id="restaurantFormButton" onclick='createRestaurant();''>Submit Form</button>
    <button class="btn btn-outline-danger" onclick='clickLogout();'>Log out</button>
    <form class="form-inline" id="logoutForm" action="logout.php"></form>
  </body>

  </html>