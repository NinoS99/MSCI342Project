<?php

  session_start();
  include_once("matchingMethod.php");

  $incomeRange = $_SESSION['incomeRange'];
  $rewardType = $_SESSION['rewardType'];

  print "<h2>$warningMessage</h2>";
  $creditCard = getCreditCardSuggestion($incomeRange,$rewardType); //Calls function that returns the credit card suggestion based on survey responses
  echo "<h2> Thank you for using our program! Happy spending!";
  echo "<h2> The following credit card suits you best: ".$creditCard."";

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
