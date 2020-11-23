<!DOCTYPE html>

<head>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
</head>


<body>
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

  ?>

<div class="container">
  <div class="row justify-content-center">
    <div>
      <h2> Thank you for using our program! Happy spending!</h2>
    </div>
    <div>
      <h2> The following credit card(s) suits you best:</h2>
    </div>
			<table class="table">
        <?php

        $creditCardArray = getCreditCardSuggestion($incomeRange,$rewardType,$student,$averageMonthlySpending,$annualFee,$creditScore,$prefferedInstitution);
      // Code to export user's results to excel
      $length = count($creditCardArray);
    //  $length  = $length/2;

      if (isset($_POST["export"])) {

      for ($x = 0; $x < $length; $x = $x + 2){

        $creditCardName = $creditCardArray[$x];

        //$throwAway = array_pop($creditCardArray);

        include 'DBController.php';
        $db_handle = new DBController();
        $productResult = $db_handle->runQuery("SELECT credit_card_company, credit_card_name, card_network, incomeRange,  reward_type, student, averageMonthlySpendingRange, creditScoreRange,  annualFee FROM credit_cards WHERE credit_card_name = '.$creditCardName.' ");

          $filename = "CreditCardInformation.xls";
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          $isPrintHeader = false;
            foreach ($productResult as $row) {
              if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
                }
                echo implode("\t", array_values($row)) . "\n";
              }
          }
        exit();
      }
          ?>
        </table>
  </div>
</div>
<br>
<br>
  <form method="post">
    <a href="../index.php">
      <div class="container">
        <div class="row justify-content-center">
        <h2> Click here to return to home page!</h2>
      </div>
    </div>
    </a>
    <div class="container">
      <div class="row justify-content-center">
  <a href="../src/allCards.php">
        <div>
          <h2> Click here to see a list of other credit cards available in the application!</h2>
        </div>
      </a>
  </form>
      
      <div id="table-container">
      <div class="btn">
          <form action="" method="post">
              <button type="submit" id="btnExport" name='export'
                  value="Export to Excel" class="btn btn-info">Export to Excel</button>
          </form>
      </div>
      
      <style>
          .btn {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
          }
  </div>
  </div>
      </style>
      
  </div>

</body>
</html>
