<?php
  include_once('../my_connect.php'); //Using previously built connection
  function getCreditCardSuggestion($incomeRange,$rewardType){
    $mysqli = get_mysqli_conn();

    $query = 'SELECT credit_card_name FROM credit_cards
            WHERE incomeRange = "'.$incomeRange.'"
            AND reward_type = "'.$rewardType.'"';

    $stmt = $mysqli->prepare($query); //updated query change for consistency
    $stmt -> execute();
    $stmt -> bind_result($creditCard);
    $stmt -> fetch();

    return $creditCard;

  }
 ?>
