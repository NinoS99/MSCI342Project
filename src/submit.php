<?php

  session_start();
  include_once("matchingMethod.php");
  //include_once("surveyPage.php");

  $incomeRange = $_SESSION['incomeRange'];
  $rewardType = $_SESSION['rewardType'];

  print "<h2>$warningMessage</h2>";
  $creditCard = getCreditCardSuggestion($incomeRange,$rewardType);
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
