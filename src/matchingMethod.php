<?php
  include_once('../my_connect.php'); //Using previously built connection
  function getCreditCardSuggestion($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution){

$creditCard = '';

      if($prefferedInstitution == 'none'){
          $creditCard = noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore);
      } else {
        $creditCardArray = institutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution);
        if(empty($creditCard)){
          $creditCard = noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore);
        }
      }

    return $creditCardArray;

  }


  function noInstitutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore){
    $mysqli = get_mysqli_conn();
    $sql = 'SELECT credit_card_name FROM credit_cards
            WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
            AND annualFee >= "'.$annualFee.'" AND creditScoreRange = "'.$creditScore.'" AND student = "'.$student.'"';

    $creditCardArray = array();

    $results = mysqli_query($mysqli, $sql);
    while($rows = $results->fetch_assoc()){
      $creditCard = $rows['credit_card_name'];
      array_push($creditCardArray, $creditCard);
    }

      if(empty($creditCardArray)){

        $sql = 'SELECT credit_card_name FROM credit_cards
                WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                AND annualFee >= "'.$annualFee.'" AND student = "'.$student.'"';

        $results = mysqli_query($mysqli, $sql);
        while($rows = $results->fetch_assoc()){
          $creditCard = $rows['credit_card_name'];
          $creditCardArray[] = $creditCard;
        }

          if(empty($creditCardArray)){

            $sql = 'SELECT credit_card_name FROM credit_cards
                    WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                    AND student = "'.$student.'"';

            $results = mysqli_query($mysqli, $sql);
            while($rows = $results->fetch_assoc()){
              $creditCard = $rows['credit_card_name'];
              $creditCardArray[] = $creditCard;
            }

            if(empty($creditCardArray)){

              $sql = 'SELECT credit_card_name FROM credit_cards
                      WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'"
                      AND student = "'.$student.'"';

              $results = mysqli_query($mysqli, $sql);
              while($rows = $results->fetch_assoc()){
                $creditCard = $rows['credit_card_name'];
                $creditCardArray[] = $creditCard;
              }
          }
        }
      }

      return $creditCard;
  }

    function institutionPreferenceQueries($incomeRange, $rewardType, $student, $averageMonthlySpending, $annualFee, $creditScore, $prefferedInstitution){
      $mysqli = get_mysqli_conn();
      $sql = 'SELECT credit_card_name FROM credit_cards
              WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
              AND annualFee >= "'.$annualFee.'" AND creditScoreRange = "'.$creditScore.'" AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

      $creditCardArray = array();

      $results = mysqli_query($mysqli, $sql);
      while($rows = $results->fetch_assoc()){
        $creditCard = $rows['credit_card_name'];
        array_push($creditCardArray, $creditCard);
      }

        if(empty($creditCardArray)){

          $sql = 'SELECT credit_card_name FROM credit_cards
                  WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                  AND annualFee >= "'.$annualFee.'" AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

          $results = mysqli_query($mysqli, $sql);
          while($rows = $results->fetch_assoc()){
            $creditCard = $rows['credit_card_name'];
            $creditCardArray[] = $creditCard;
          }

            if(empty($creditCardArray)){

              $sql = 'SELECT credit_card_name FROM credit_cards
                      WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'" AND averageMonthlySpendingRange = "'.$averageMonthlySpending.'"
                      AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

              $results = mysqli_query($mysqli, $sql);
              while($rows = $results->fetch_assoc()){
                $creditCard = $rows['credit_card_name'];
                $creditCardArray[] = $creditCard;
              }

              if(empty($creditCardArray)){

                $sql = 'SELECT credit_card_name FROM credit_cards
                        WHERE incomeRange = "'.$incomeRange.'" AND reward_type = "'.$rewardType.'"
                        AND student = "'.$student.'" AND credit_card_company = "'.$prefferedInstitution.'"';

                $results = mysqli_query($mysqli, $sql);
                while($rows = $results->fetch_assoc()){
                  $creditCard = $rows['credit_card_name'];
                  $creditCardArray[] = $creditCard;
                }
            }
          }
        }

        return $creditCardArray;
    }
 ?>
