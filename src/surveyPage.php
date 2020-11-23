<?php
  //
  //  TODO:
  //  ensure all fields are checked for the correct datatype if being input to database
  //  update SQL queries to add all fields to DTB
  //  Make field values not reset when "All Fields Required" error message displays
  //  Make option based fields pull available options from database
  //  HTML Formatting and Seperation of fields
  //  May be more pls look and see - Jonathan
  // JONATHAN WORKING ON POPULATION OF OPTIONS FROM DTB AND FIELD RESTRICTIONS
  //
  session_start();
  include_once('../my_connect.php');
  //include_once('matchingMethod.php');
  if (isset($_POST["create"])){
    $mysqli = get_mysqli_conn();
    $required = array('email','firstName', 'lastName','incomeRange','rewardType','student_bool','annualFee', 'prefferedInstitution'); //Add remaining survey questions to array
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
      $email = $_POST['email'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $incomeRange = $_POST['incomeRange'];
      $rewardType = $_POST['rewardType'];
      $student = $_POST['student_bool'];
      $averageMonthlySpending = $_POST['averageMonthlySpending'];
      //$creditScoreKnown = $_POST['creditScoreKnown'];
      $creditScore = $_POST['creditScore'];
      $annualFee = $_POST['annualFee'];
      $prefferedInstitution = $_POST['prefferedInstitution'];
      //ADD REMAINING VARIABLES!
      //Create session variables for later use
      $_SESSION['incomeRange'] = $incomeRange;
      $_SESSION['rewardType'] = $rewardType;
      $_SESSION['student'] = $student;
      $_SESSION['averageMonthlySpending'] = $averageMonthlySpending;
      //$_SESSION['creditScoreKnown'] = $creditScoreKnown;
      $_SESSION['creditScore'] = $creditScore;
      $_SESSION['annualFee'] = $annualFee;
      $_SESSION['prefferedInstitution'] = $prefferedInstitution;
      //Add session variables for remaining survey questions
      $sql = 'INSERT into users (first_name,last_name, email)
              values ("'.$firstName.'","'.$lastName.'","'.$email.'")';  //Need to add email, confused how first, last inputs into full name in the DTB
      $mysqli -> query($sql); //input query of customer details
      $sql2 = 'INSERT into user_responses (email,rewardType,incomeRange,student,monthlySpending,annualFee,creditScore,preferredInstitution)
              values ("'.$email.'","'.$rewardType.'","'.$incomeRange.'","'.$student.'","'.$averageMonthlySpending.'","'.$annualFee.'","'.$creditScore.'","'.$prefferedInstitution.'")';
      $mysqli -> query($sql2); //input query of user responses
      $warningMessage = "Survey Complete!";
      header("Location: submit.php");
    }
  }

  if (isset($_POST["homePage"])){
      header("Location: ../index.php");
    }
  ?>
  <html>
<head>


  <head>
     <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

      <!--Create text styles-->
      <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
      <!--Import relevant style sheets-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--End head-->
  </head>

  <script>
  function changeStatus(creditscoreKnown) //as per Jon's request, changes the visibility of the credit score dropdown
    {
      var status = document.getElementbyID('creditScore');
      status.disabled=creditscoreKnown.checked ? false : true;
      if(!status.disabled){
        status.focus();
      }
    }
  </script>

</head>
<center>

       <!-- Jumbotron titlebox-->
        <div class = "jumbotron">
            <h1 class="text-primary">
            <p class="display-3">- User Survey - </p>
            </h1>
        </div>
    <br>

      <form method="post" enctype="multipart/form-data">
        <label for = 'email' > <h3> Email    </h3> </label> <!-- Intake Customer Email  -->
        <input type = 'email' id = 'email' name = 'email' value="<?php
        echo isset($_POST['email']) ? $_POST['email'] : '';
        ?>" autofocus>
 
        <br>
        <label for = 'firstName' > <h3> First Name    </h3> </label> <!-- Intake Customer First Name  -->
        <input type = 'text' id = 'firstName' name = 'firstName' maxlength="30" value="<?php
        echo isset($_POST['firstName']) ? $_POST['firstName'] : '';
        ?>">
        
        <br>
        <label for = 'lastName' > <h3> Last Name    </h3> </label> <!-- Intake Customer Last Name -->
        <input type = 'text' id = 'lastName' name = 'lastName' maxlength="30" value="<?php
        echo isset($_POST['lastName']) ? $_POST['lastName'] : '';
        ?>">

        
      <br>
      <br>
      <label for='incomeRange' > <h5> Income Range </h5> </label> <!-- Justify better and add positioning -->
      
       <?php
            $mysqli = get_mysqli_conn();
            $resultSet = $mysqli -> query("SELECT DISTINCT incomeRange FROM credit_cards");
            $mysqli -> query($resultSet); //output selection criteria

            echo '<select name="incomeRange" id = "incomeRange">';
            while ($row = $resultSet->fetch_assoc()) {
                  echo '<option value="'.$row['incomeRange'].'">'.$row['incomeRange'].'</option>';
            }

            echo '</select>';
      ?>
      
      <br>
      <label for='student_bool' > <h5> Are you a student registered in a University or College? </h5> </label> <!-- -->
      <select name='student_bool' id = 'student_bool'>
        <option value='false'>No</option>
        <option value='true'>Yes</option>
      </select>
       
      <br>
      <label for='rewardType' > <h5> Reward Type </h5> </label>  <!-- Intake reward type details -->

       <?php
            $mysqli = get_mysqli_conn();
            $resultSet = $mysqli -> query("SELECT DISTINCT reward_type FROM credit_cards");
            $mysqli -> query($resultSet); //output selection criteria

            echo '<select name="rewardType" id = "rewardType">';
            while ($row = $resultSet->fetch_assoc()) {
                  echo '<option value="'.$row['reward_type'].'">'.$row['reward_type'].'</option>';
            }

            echo '</select>';
      ?>
      
      <br>
      <label for='averageMonthlySpending' > <h5> What is your average monthly spending? </h5> </label>  <!-- Intake reward type details -->

     <?php
            $mysqli = get_mysqli_conn();
            $resultSet = $mysqli -> query("SELECT DISTINCT averageMonthlySpendingRange FROM credit_cards");
            $mysqli -> query($resultSet); //output selection criteria

            echo '<select name="averageMonthlySpending" id = "averageMonthlySpending">';
            while ($row = $resultSet->fetch_assoc()) {
                  echo '<option value="'.$row['averageMonthlySpendingRange'].'">'.$row['averageMonthlySpendingRange'].'</option>';
            }

            echo '</select>';
      ?>
      
      <br>
      <label for='creditScoreKnown' > <h5> Do you know your credit score? </h5> </label>
      <input type='checkbox' id='creditscoreKnown' name='creditScoreKnown' value='true' onclick='changeStatus(this)'/> <!-- Can we make the value of this show the selection form below if the checkbox is true -->
      <label for='What range is your credit score in?' > What range is your credit score in? </label>  <!-- Intake reward type details -->
      
      <?php
            $mysqli = get_mysqli_conn();
            $resultSet = $mysqli -> query("SELECT DISTINCT creditScoreRange FROM credit_cards");
            $mysqli -> query($resultSet); //output selection criteria

            echo '<select name="creditScore" id = "creditScore">';
            while ($row = $resultSet->fetch_assoc()) {
                  echo '<option value="'.$row['creditScoreRange'].'">'.$row['creditScoreRange'].'</option>';
            }

            echo '</select>';
      ?>
         
       <br>
       <label for = 'annualFee' > <h5> What is the maximum annual fee you are willing to incur? </h5> </label>
          <input type = 'number' id = 'annualFee' name = 'annualFee' value="<?php
          echo isset($_POST['annualFee']) ? $_POST['annualFee'] : '';
          ?>">
          <br>
          

        <label for='prefferedInstitution' > <h5> What is your preffered institution/bank? </h5></label>  <!-- Preffered Instituation  -->

       <?php
            $mysqli = get_mysqli_conn();
            $resultSet = $mysqli -> query("SELECT DISTINCT credit_card_company FROM credit_cards");
            $mysqli -> query($resultSet); //output selection criteria

            echo '<select name="prefferedInstitution" id = "prefferedInstitution">';
            while ($row = $resultSet->fetch_assoc()) {
                  echo '<option value="'.$row['credit_card_company'].'">'.$row['credit_card_company'].'</option>';
            }
            echo '<option value="none">none</option>';
            echo '</select>';
      ?>

      <br>  
      <br>
      <button type = 'submit' name = 'create'><h5> Submit Survey</h5></button> <!--  Formatting of Submit survey button can improve -->
      <button type = 'submit' name = 'homePage'><h5>Return to Home Page</h5></button>

      </form>
    </center>
</html>

<?php print "<h2>$warningMessage</h2>";
?>