<?php
session_start();
if(isset($_SESSION["username"])) {
  header("Location: ./");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="stylesheetlogin.css"/>
    <title>Cville Foodies</title>

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
        <a class="nav-link" href="./about.html">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
    </ul>
    
  </div>
</nav>

  <body id="homepage">
    <?php if(isset($_SESSION["empty"])) : ?>
        <div class="alert alert-warning">
          <strong>Sign Up Error!</strong> One or more fields is missing.
        </div>
    <?php elseif(isset($_SESSION["taken"])) : ?>
        <div class="alert alert-warning">
          <strong>Username already taken!</strong> Please choose another one.
        </div>
    <?php elseif(isset($_SESSION["successful"])) : ?>
        <div class="alert alert-success">
          <strong>Sign Up Success!</strong> Your account has been created.
        </div>
    <?php elseif(isset($_SESSION["badSignIn"])) : ?>
        <div class="alert alert-danger">
          <strong>Incorrect Username or Password!</strong> Please try again.
        </div>
    <?php 
      endif;
      session_unset(); 

      // destroy the session 
      session_destroy(); 
    ?>

    <div class="white">
      <div class="row">
        <div class="col-sm-5">

          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Login to our site</h3>
                <p>Enter username and password to log on:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-lock"></i>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" method="post" action="signin.php" class="login-form">
                <div class="form-group">
                  <label class="sr-only" for="form-username">Username</label>
                  <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Password</label>
                  <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                </div>
                <button type="submit" class="btn">Sign in!</button>
              </form>
            </div>
          </div>

        </div>

        <div class="col-sm-1 middle-border"></div>
        <div class="col-sm-1"></div>

        <div class="col-sm-5">

          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Sign up now</h3>
                <p>Fill in the form below to get instant access:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-pencil"></i>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" method="post" action="signup.php" class="registration-form">
                <div class="form-group">
                  <label class="sr-only" for="form-first-name">First name</label>
                  <input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-last-name">Last name</label>
                  <input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-street">Street</label>
                  <input type="text" name="form-street" placeholder="Street..." class="form-street form-control" id="form-street">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-city">City</label>
                  <input type="text" name="form-city" placeholder="City..." class="form-city form-control" id="form-city">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-state">State</label>
                  <input type="text" name="form-state" placeholder="State..." class="form-state form-control" id="form-state">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-username">Username</label>
                  <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Password</label>
                  <input type="text" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                </div>
                <button type="submit" class="btn">Sign me up!</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>

<footer> &copy; Copyright 2018 - Katherine Qian, Jodie Ryu, Youbeen Shim, Joshua Ya. All rights reserved.
</html>