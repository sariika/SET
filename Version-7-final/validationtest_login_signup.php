<?php
session_start();
require ("FUNCTION.php");

class Validationtest extends ACCOUNT_ACCESS {


      //SINGUP VALIDATION TESTS
      public function accountsignup() {
        $_POST["username"] = "userindb";
        $_POST["email"] = "user@domain.ie";
        $_POST["password"] = "password123";

        $_SESSION = [];


        $account_creation = new ACCOUNT_ACCESS();
        $account_creation ->SIGNUP();
      }

      public function accountsignup_fail() {
        $_POST["username"] = ""; //testing the error catcher by leaving details blank. the html validation prevents this but just in case
        $_POST["email"] = "user@domain.ie";
        $_POST["password"] = "password123";

        $_SESSION = [];

        $account_creation = new ACCOUNT_ACCESS();
        $account_creation ->SIGNUP();
      }



    //LOGIN VALIDATION TESTS
    public function correctdetails() { //TO MAKE THIS WORK SIGNUP FOR AN ACCONUT WITH THESE DETAILS. THIS TESTS LOGIN WITH CORRECT DETAILS
        $_POST["username"] = "userindb";
        $_POST["email"] = "user@domain.ie";
        $_POST["password"] = "password123";

        $_SESSION = [];


        $correct_account = new ACCOUNT_ACCESS();
        $correct_account ->LOGIN();
    }

    
    public function incorrectdetails() { //TO MAKE THIS WORK SIGNUP FOR AN ACCONUT WITH THESE DETAILS. THIS TESTS LOGIN WITH INCORRECT DETAILS
        $_POST["username"] = "userindb";
        $_POST["email"] = "user@domain.ie";
        $_POST["password"] = "paswrod"; //different password

        $_SESSION = [];

        $incorrect_account = new ACCOUNT_ACCESS();
        $incorrect_account ->LOGIN();
    }
}
?>


<?php 
$VALIDATION_OBJ = new Validationtest;





if (isset($_POST["submit"])) { //if theres a post request
  $VALIDATION_OBJ -> accountsignup();
}
//CHANGE THE FUNCTION MANUALLY TO TEST EACH VALDIATION FUNCTION
?>

<form method="post" id="signup">
 <h4>go to line 70 and change $VALIDATION_OBJ to the validation test function you want to use</h4>
<br>   
    <input type="submit" name="submit" value="submit">
    
      </form>  










      