<?php
  include_once('../my_connect.php'); //Using previously built connection
  function getCreditCardSuggestion($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution){

$creditCard = '';

      if($prefferedInstitution == "none"){
          $creditCardArray = noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore);
      } else {
        $creditCardArray = institutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution);
        if(empty($creditCardArray)){
          $creditCardArray = noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore);
        }
      }

    return $creditCardArray;

  }


  ?>

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <div class="container">
      <div class="row justify-content-center">
      			<table class="table">
  				<thead>
  					<tr>
  						<th style="text-align:left">Credit Card Name</th>
  						<th style="text-align:left">URL</th>
  					</tr>
  				</thead>

          <?php

  function noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore){
    $mysqli = get_mysqli_conn();
    $sql = 'SELECT credit_card_name, URL FROM credit_cards
            WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
            AND annualFee >= "'.$annualFee.'" AND creditScoreRange = "'.$creditScore.'" AND student = "'.$student.'"';

    $creditCardArray = array();

    $results = mysqli_query($mysqli, $sql);

    while($rows = $results->fetch_assoc()) {?>
      <tr>
        <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
        <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
      </tr>
      <tr>
        <td><?php print ""; ?></td>
        <td><?php print ""; ?></td>
      </tr>
      <?php
      array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

    }

      if(empty($creditCardArray)){

        $sql = 'SELECT credit_card_name, URL FROM credit_cards
                WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                AND annualFee >= "'.$annualFee.'" AND student = "'.$student.'"';

        $results = mysqli_query($mysqli, $sql);
        while($rows = $results->fetch_assoc()) {?>
          <tr>
            <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
            <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
          </tr>
          <tr>
            <td><?php print ""; ?></td>
            <td><?php print ""; ?></td>
          </tr>
          <?php
          array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

        }

          if(empty($creditCardArray)){

            $sql = 'SELECT credit_card_name, URL FROM credit_cards
                    WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                    AND student = "'.$student.'"';

            $results = mysqli_query($mysqli, $sql);
            while($rows = $results->fetch_assoc()) {?>
              <tr>
                <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
                <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
              </tr>
              <tr>
                <td><?php print ""; ?></td>
                <td><?php print ""; ?></td>
              </tr>
              <?php
              array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

            }


            if(empty($creditCardArray)){

              $sql = 'SELECT credit_card_name, URL FROM credit_cards
                      WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'"
                      AND student = "'.$student.'"';

              $results = mysqli_query($mysqli, $sql);
              while($rows = $results->fetch_assoc()) {?>
                <tr>
                  <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
                  <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
                </tr>
                <tr>
                  <td><?php print ""; ?></td>
                  <td><?php print ""; ?></td>
                </tr>
                <?php
                array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

              }

          }
        }
      }

      return $creditCardArray;
  }

    function institutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution){
      $mysqli = get_mysqli_conn();
      $sql = 'SELECT credit_card_name, URL FROM credit_cards
              WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
              AND annualFee >= "'.$annualFee.'" AND creditScoreRange = "'.$creditScore.'" AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

      $creditCardArray = array();

      $results = mysqli_query($mysqli, $sql);


      while($rows = $results->fetch_assoc()) {?>
        <tr>
          <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
          <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
        </tr>
        <tr>
          <td><?php print ""; ?></td>
          <td><?php print ""; ?></td>
        </tr>
        <?php
        array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

      }


        if(empty($creditCardArray)){

          $sql = 'SELECT credit_card_name, URL FROM credit_cards
                  WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                  AND annualFee >= "'.$annualFee.'" AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

          $results = mysqli_query($mysqli, $sql);
          while($rows = $results->fetch_assoc()) {?>
            <tr>
              <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
              <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
            </tr>
            <tr>
              <td><?php print ""; ?></td>
              <td><?php print ""; ?></td>
            </tr>
            <?php
            array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

          }


            if(empty($creditCardArray)){

              $sql = 'SELECT credit_card_name, URL FROM credit_cards
                      WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                      AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

              $results = mysqli_query($mysqli, $sql);
              while($rows = $results->fetch_assoc()) {?>
                <tr>
                  <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
                  <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
                </tr>
                <tr>
                  <td><?php print ""; ?></td>
                  <td><?php print ""; ?></td>
                </tr>
                <?php
                array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

              }


              if(empty($creditCardArray)){

                $sql = 'SELECT credit_card_name, URL FROM credit_cards
                        WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'"
                        AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

                $results = mysqli_query($mysqli, $sql);
                while($rows = $results->fetch_assoc()) {?>
                  <tr>
                    <td style="text-align:left"><?php echo $rows['credit_card_name']; ?></td>
                    <td style="text-align:center"><?php echo '<a href="' . $rows['URL'] . '">Credit Card Website</a>'; ?></td>
                  </tr>
                  <tr>
                    <td><?php print ""; ?></td>
                    <td><?php print ""; ?></td>
                  </tr>
                  <?php
                  array_push($creditCardArray, $rows['credit_card_name'], $rows['URL']);

                }

            }
          }
        }
      return $creditCardArray;
    }
  ?>
    </table>
        </div>
        </div>
