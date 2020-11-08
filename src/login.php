<!--

Group 6 Sprint #1 Credit Card Application Web Page
Sunday October 25th 2020
Login page for MSCI442 Credit Card Application Project Sprint #1

-->

<?php
session_start();
  include_once('../my_connect.php');
 if (isset($_POST["create"])){
    $mysqli = get_mysqli_conn();
    $required = array('firstName', 'lastName','incomeRange','rewardType');
    $error = false;
    foreach($required as $field){
      if(empty($_POST[$field])){
        $error = true;
      }
    }
    if ($error){
      $warningMessage = "All fields are required.";
    }
    else {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $incomeRange = $_POST['incomeRange'];
      $rewardType =$_POST['rewardType'];
       //Create session variables for later use
      $_SESSION['incomeRange'] = $incomeRange;
      $_SESSION['rewardType'] = $rewardType;
      $sql = 'INSERT into users (first_name,last_name,income_range,reward_type)
              values ("'.$firstName.'","'.$lastName.'","'.$incomeRange.'","'.$rewardType.'")';
      $mysqli -> query($sql); //input query of customer details
      $warningMessage = "Survey Complete!";
      header("Location: submit.php");
    }
  }
?>

<html>
	<body>
         <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
           <!-- First section -->
        <h1> Please login or register for an account! </h1> <br>        
    
    <!-- Login credentials and create account section-->
 <form>
  <h2> <label for ="userName"> Username: </label> </h2>
   <input type = "text" name = "userName"> </input> <br>  
    
  </h2> <label for ="password">Password:</label> </h2> 
   </h2>   <input type = "text" name = "password"></input><br> </h2> 
    </form>

 <!-- Spacing-->
<span style="display:block; height: 20;"></span>
<!-- Button used to login and go to survey -->
<a href="surveyPage.php"><button class="button"> </br><h1>Login</h1></br></button></a>
<a href="createaccount.php"><button class="buttonCreateAccount"></br><h2>Create Account</h2></br></button></a>
	
</html>
        