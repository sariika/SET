<?php include "template/header_login.php";
include "FUNCTION.php";
?>

<?php

// The signup page is basically a copy of the original login page. Main difference being it doesn't check if there's any matching items in the database and just goes straight to home.php



if (isset($_POST["submit"])) { //if theres a post request
   $SignupFunction  = new ACCOUNT_ACCESS();
   $SignupFunction -> SIGNUP();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="topnav">
  <h1 id="signup-title">SIGNUP</h1>
</div>



 
<form method="post" id="signup">
    <label for="username">Username</label>
    <input type ="text" name="username" id="username" required maxlength="20" placeholder="username (max 20 char)">
<br>
    <label for="email">Email</label>
    
    <input type="email" name="email" id="email" required placeholder="email@domain.com">
<br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required minlength="8" placeholder="password (min 8 char)">
<br>   
    <input type="submit" name="submit" value="submit">
    
      </form>  


      
