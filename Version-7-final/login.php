<?php include "template/header_login.php";
include "FUNCTION.php";
?>

<?php

//LOGIN PAGE. user enters login info unto the form and a check is run to see if it all matches they get sent to the homepage.

if (isset($_POST["submit"])) { //if theres a post request
  
    $SignupFunction  = new ACCOUNT_ACCESS();
    $SignupFunction -> LOGIN();
      
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
    <style>
       
    </style>
   <h1 id="login-title">LOGIN</h1>
</div>



 
<form method="post">

    <input type ="text" name="username" id="username" required maxlength="20" placeholder="username">
<br>
   
    <input type="email" name="email" id="email" required placeholder="email">
<br>
   
    <input type="password" name="password" id="password" required placeholder="password">
<br>   
    <input type="submit" name="submit" value="submit">
    
      </form>  
      

      <button><a href="signup.php">New user? Click here to create an account</a></button>


  
