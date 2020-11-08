<?php
  include_once('../my_connect.php'); //Using previously built connection
  function getCreditCardSuggestion($incomeRange,$rewardType){
    $mysqli = get_mysqli_conn();

    $query = 'SELECT credit_card_name FROM credit_cards
            WHERE incomeRange = "'.$incomeRange.'"
            AND reward_type = "'.$rewardType.'"';
            //Nice Nino! Maybe to futher complexify this algorithm we can start applying more attributes to the cards
            //Then we can use the survey results and some sort of weighting system to determine which attributes apply to the customer aswell
            //Then we can compare the customers attributes and the credit cards and pull up the best matches
            //We will also further need to think of priority and sorting to give the customer the closest match first!
    $stmt = $mysqli->prepare($query); //updated query change for consistency
    $stmt -> execute();
    $stmt -> bind_result($creditCard);
    $stmt -> fetch();

    return $creditCard;

  }
 ?>
