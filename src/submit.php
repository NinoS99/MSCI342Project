<!-- This is functioning but we need to make it a list, and will need to develop a method for sorting and filtering the results
    The page is also not looking pretty or well formatted.

-->
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
  //Calls function that returns the credit card suggestion based on survey responses
  $creditCardArray = getCreditCardSuggestion($incomeRange,$rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution); 

  // Code to export user's results to excel
  $creditCardName = array_pop(array_reverse($creditCardArray));
  include 'DBController.php';
  $db_handle = new DBController();
  $productResult = $db_handle->runQuery("select credit_card_company, credit_card_name, card_network, incomeRange,  reward_type, student, averageMonthlySpendingRange, creditScoreRange,  annualFee from credit_cards where credit_card_name = '{$creditCardName}' "); 

  if (isset($_POST["export"])) {
      $filename = "CreditCardInformation.xls";
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
      $isPrintHeader = false;
      if (! empty($productResult)) {
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
    print "<h2>$warningMessage</h2>";
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
        
    <a href="../src/allCards.php">
      <div>
        <h2> Click here to see a list of other credit cards available in the application!</h2>
      </div>
    </a>
        
    <h2> Click on the button below to export information of your matched credit card into an Excel file!</h2>
        
  </form>
    
    <div id="table-container">
    <div class="btn">
        <form action="" method="post">
            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-info">Export to
                excel</button>
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
    </style>
    
</div>
        
</html>
