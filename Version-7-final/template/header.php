<?php

@session_start(); //Session is started


if ($_SESSION['Active'] == false) { //if the session variable Active, which is how we know the user is logged in or not is false

header("location:login.php"); //redirect to login page
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<nav>
<div class="topnav">
  <a  href="home.php" class="active">Up to the minute</a>
  <a href="timetable.php" class="item">my timetables</a> 
  <a href="producttt.php" class="item">products</a>

  <div class="split">
  <a href="cartt.php" class="rs"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#1f1f1f"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg></a>
  <a href="LOGOUT_BUTTON.php"class="rs"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></a>
  
  </div>
</div>

<body>
  <h3>Hello <?php echo($_SESSION["Username"]);?></h3> <!--Lets the user know who they are logge in as -->