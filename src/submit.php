<!DOCTYPE html>

<head>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
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

<!-- Jumbotron titlebox-->
 <div class = "jumbotron">
     <h1 class="text-primary">
     <p class="display-5"> Thank you for using our program! Happy spending!  </p>
     <p class="display-7"> The following credit card(s) suits you best:  </p>
     </h1>
 </div>


<body style="background-color:#eff8fe;">
<?php

  session_start();
  include_once("matchingMethod.php");
  include_once('../my_connect.php'); //Using previously built connection
  include_once('PHPExcel.php');

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
			<table class="table">
        <?php

      $creditCardArray = getCreditCardSuggestion($incomeRange,$rewardType,$student,$averageMonthlySpending,$annualFee,$creditScore,$prefferedInstitution);
      // Code to export user's results to excel
      $length = count($creditCardArray);

      $testArray = array_chunk($creditCardArray,2);

    //  $length  = $length/2;

    $creditCardName = $creditCardArray[0];
    //include("DBController.php");
    //$db_handle = new DBController();
    //$productResult = $db_handle->runQuery("SELECT credit_card_company, credit_card_name, card_network, incomeRange, reward_type, student, averageMonthlySpendingRange, creditScoreRange, annualFee FROM credit_cards WHERE credit_card_name = '.$creditCardName.' ");


          ?>
        </table>
  </div>
</div>

<?php
if (isset($_POST["export"])) {
  //for ($x = 0; $x < $length; $x = $x + 2){

$filename = "CreditCardInformation.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo "<br>";
echo "<h1>Here is What You Answered to the User Survey:</h1>";

echo "<h2>Your income range is: $incomeRange</h2>";
echo "<br>";
echo "<h2>Your preffered reward type is: $rewardType</h2>";
echo "<br>";
echo "<h2>Student: $student</h2>";
echo "<br>";
echo "<h2>Your average monthly spending is: $averageMonthlySpending</h2>";
echo "<br>";
echo "<h2>The maximum annual fee you are willing to pay is: $$annualFee </h2>";
echo "<br>";
echo "<h2>Your credit score is: $creditScore</h2>";
echo "<br>";
echo "<h2>Your preffered institution is: $prefferedInstitution</h2>";

exit;

}
 ?>

<br>
<br>
  <form method="post">
    <a href="../index.php">
      <div class="container">
        <div class="row justify-content-center">
        <h5> Click here to return to home page!</h5>
      </div>
    </div>
    </a>
      <a href="../src/allCards.php">
    <div class="container">
      <div class="row justify-content-center">
          <h5> Click here to see a list of other credit cards available in the application!</h5>
    </div>
    </div>
      </a>
  </form>

  <style>
  .makeitalign {
    height: 200px;
    position: relative;
  }

  .inthemiddle {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  </style>

<div class="makeitalign">
        <div class="inthemiddle">  
      <!--<div id="table-container">-->
     <!-- <div class="btn">-->
          <form action="" method="post">
              <button type="submit" id="btnExport" name='export'
                  value="Export to Excel" class="btn btn-info">Export to Excel</button>
          </form>
      </div>
    <!--</div>-->
    <!--  </div>-->
        </div>
</body>
</html>
