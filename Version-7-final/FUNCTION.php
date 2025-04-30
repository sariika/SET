<?php

//IF YOU PLAN ON DOING ANYTHING WITH THESE FUNCTIONS REMEMBER. html form items are have lowercase while Session variables have first letter capitalisation
class ACCOUNT_ACCESS { 


 function SIGNUP() {

    require "userdb_config.php";


    try {
        $connection = new PDO($dsn, $username, $password, $options); 
        


        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "site_users", //no idea what this all does
        implode(", ", array_keys($new_account)),
        ":" . implode(", :", array_keys($new_account)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_account);

        
    } 
        catch(PDOException $error) { //error handler
        echo $sql . "<br>" . $error->getMessage();
        }

        if ($_POST["username"] == "" or $_POST["email"] == "" or $_POST["password"] == "") {
            echo "invalid username. You cannot leave any details blank";
            $_SESSION['Active'] = false;

        }
        
        else {
        $_SESSION['Username'] = $_POST["username"];  //please remember the capitalisation, 
        $_SESSION['Active'] = true; //variable used for checking logged in status to true
        header('Location:home.php');
        die;
        }

 }

 function LOGIN() {
    require "userdb_config.php"; //FIX LATER ON!!! //did me in the past


    $connection = new PDO($dsn,$username,$password,$options); //establishing a new PDO connection

    $sql = "SELECT username, password, email from site_users where username = :username"; //SQl select from the site_users table
    $statement = $connection->prepare($sql); 
    $temp = ($_POST["username"]); //temp name to prevent injection ttacks
    $statement->bindParam(":username",$temp,PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row => $rows)
    {
        $user_db = $rows["username"]; 
        $pwd_db = $rows["password"];
        $email_db = $rows["email"];

            if( $_POST['username'] == $user_db && $_POST["password"] == $pwd_db && $email_db == $_POST["email"]) { //if all details match an entry in the DB

                $_SESSION['Username'] = $_POST["username"];  //set session variable Username to form item username
                $_SESSION['Active'] = true; //variable used for checking logged in status to true
                header("location:home.php"); //redirect
                exit;
                
            }

            

    }

//else
echo 'Login failed: incorrect details or user does not exist';
$_SESSION['Active'] = false; //deny acces

 }


//logout function removed and put as its own seperate file as I can't figure out how to work with the form submit





}
