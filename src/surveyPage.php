<?php
  //
  //  TODO:
  //  ensure all fields are checked for the correct datatype if being input to database
  //  update SQL queries to add all fields to DTB
  //  Make field values not reset when "All Fields Required" error message displays
  //  Make option based fields pull available options from database
  //  HTML Formatting and Seperation of fields
  //  May be more pls look and see - Jonathan
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
  ?>
  <html>
<head>
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
    <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
    <h1>- User Survey - </h1>
      <form method="post" enctype="multipart/form-data">
        <label for = 'email' > Email </label> <!-- Intake Customer Email (maybe we should add more data/different customer details to intake -->
        <input type = 'text' id = 'email' name = 'email' value="<?php
        echo isset($_POST['email']) ? $_POST['email'] : '';
        ?>">
        <br>
        <br>
        <label for = 'firstName' > First Name </label> <!-- Intake Customer First Name (maybe we should add more data/different customer details to intake -->
        <input type = 'text' id = 'firstName' name = 'firstName' value="<?php
        echo isset($_POST['firstName']) ? $_POST['firstName'] : '';
        ?>">
        <br>
          <br>
        <label for = 'lastName' > Last Name </label> <!-- Intake Customer Last Name -->
        <input type = 'text' id = 'lastName' name = 'lastName' value="<?php
        echo isset($_POST['lastName']) ? $_POST['lastName'] : '';
        ?>">
        <br>
          <br>
            <br>

      <label for='incomeRange' > Income Range </label> <!-- Justify better and add positioning -->
      <select name='incomeRange' id = 'incomeRange'> <!-- Intake income range -->
        <option value='$0 - $30,000'>$0 to $30,000</option>
        <option value='$30,000 - $100,000'>$30,000 to $100,000</option>
        <option value='$100,000+'>$100,000 and Up</option>
      </select>
        <br>
          <br>
      <label for='student_bool' > Are you a student registered in a University or College? </label> <!-- -->
      <select name='student_bool' id = 'student_bool'>
        <option value='false'>No</option>
        <option value='true'>Yes</option>
      </select>
        <br>
          <br>
      <label for='rewardType' > Reward Type </label>  <!-- Intake reward type details -->
      <select name='rewardType' id = 'rewardType'>
        <option value='Points'>Points</option>
        <option value='Cash Back'>Cash Back</option>
        <option value='Travel'>Travel</option> <!--  Mabybe list should be generated from the database -->
      </select>
        <br>
          <br>
      <label for='averageMonthlySpending' > What is your average monthly spending? </label>  <!-- Intake reward type details -->
      <select name='averageMonthlySpending' id = 'averageMonthlySpending'>
        <option value='$0 - $500'>$0 - $500</option>
        <option value='$500 - $1000'>$500 - $1000</option>
        <option value='$1000 - $2000'>$1000 - $2000</option>
        <option value='$2000 - $5000'>$2000 - $5000</option>
        <option value='$5000+'>$5000 and Up</option><!--  Possibly make this a slider? -->
      </select>
        <br>
          <br>
      <label for='creditScoreKnown' > Do you know your credit score? </label>
      <input type='checkbox' id='creditscoreKnown' name='creditScoreKnown' value='true' onclick='changeStatus(this)'/> <!-- Can we make the value of this show the selection form below if the checkbox is true -->
      <label for='What range is your credit score in?' > What range is your credit score in? </label>  <!-- Intake reward type details -->
      <select name='creditScore' id='creditScore'>//disabled='disabled'
        <option value='0 - 200'>0 - 200</option>
        <option value='200 - 400'>200 - 400</option>
        <option value='400 - 600'>400 - 600</option>
        <option value='600 - 800'>600 - 800</option>
        <option value='800 - 900'>800 - 900</option>
      </select>
          <br>
            <br>
       <label for = 'annualFee' > What is the maximum annual fee you are willing to incur? </label>
          <input type = 'text' id = 'annualFee' name = 'annualFee' value="<?php
          echo isset($_POST['annualFee']) ? $_POST['annualFee'] : '';
          ?>">
          <br>
            <br>
        <label for='prefferedInstitution' > What is your preffered institution/bank? </label>  <!-- Preffered Instituation (or cards you already have? Which would kinda tell you) - also options should pull from database -->
        <select name='prefferedInstitution' id = 'prefferedInstitution'>
          <option value='none'>none</option>
          <option value='TD Canada'>TD Canada</option>
          <option value='ScotiaBank'>ScotiaBank</option>
          <option value='BMO'>BMO</option>
          <option value='CIBC'>CIBC</option>
          <option value='Libro'>Libro</option>
        </select>
          <br>
            <br>
      <button type = 'submit' name = 'create'>Submit Survey</button> <!--  Formatting of Submit survey button can improve -->
      </form>
</html>

<?php print "<h2>$warningMessage</h2>";
  //$creditCard = getCreditCardSuggestion($incomeRange,$rewardType);
  //echo "<h2> The following credit card suits you best: ".$creditCard."";
?>
