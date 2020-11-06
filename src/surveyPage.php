<?php
  session_start();
  include_once('../my_connect.php');
  //include_once('matchingMethod.php');
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
    <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
    <h1>- User Survey - </h1>
      <form method="post" enctype="multipart/form-data">
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
      <label for='rewardType' > Reward Type </label>  <!-- Intake reward type details -->
      <select name='rewardType' id = 'rewardType'>
        <option value='Points'>Points</option>
        <option value='Cash Back'>Cash Back</option> <!--  Mabybe list should be generated from the database -->
      </select>
        <br>
          <br>
            <br>
          <button type = 'submit' name = 'create'>Submit Survey</button> <!--  Formatting of Submit survey button can improve -->
          <h4>Please fill out all fields!</h4>
      </form>
</html>

<?php print "<h2>$warningMessage</h2>";
  //$creditCard = getCreditCardSuggestion($incomeRange,$rewardType);
  //echo "<h2> The following credit card suits you best: ".$creditCard."";
?>
