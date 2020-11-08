<?php

  session_start();
  include_once("matchingMethod.php");

  $incomeRange = $_SESSION['incomeRange'];
  $rewardType = $_SESSION['rewardType'];
  $student = $_SESSION['student'];
  $averageMonthlySpending = $_SESSION['averageMonthlySpending'];
  $creditScoreKnown = $_SESSION['creditScoreKnown'];
  $annualFee = $_SESSION['annualFee'];
  $creditScore = $_SESSION['creditScore'];
  $prefferedInstitution = $_SESSION['prefferedInstitution'];

  print "<h2>$warningMessage</h2>";
  $creditCardArray = getCreditCardSuggestion($incomeRange,$rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution); //Calls function that returns the credit card suggestion based on survey responses
  echo "<h2> Thank you for using our program! Happy spending!";
  echo "<h2> The following credit card(s) suits you best: ";

  foreach ($creditCardArray as &$value){
    print "<h2>$value</h2>";
    print('');
  }

 ?>

<html>
<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
  <form method="post">
    <a href="../index.php">
      <div>
        <h2> Click here to return to home page!</h2>
      </div>
    </a>
  </form>
</html>
