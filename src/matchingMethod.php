<?php
  include_once('../my_connect.php');
  function getCreditCardSuggestion($incomeRange,$rewardType){
    $mysqli = get_mysqli_conn();
    $sql = 'SELECT credit_card_name FROM credit_cards
            WHERE incomeRange = "'.$incomeRange.'"
            AND reward_type = "'.$rewardType.'"';
    $stmt = $mysqli->prepare($sql);
    $stmt -> execute();
    $stmt -> bind_result($creditCard);
    $stmt -> fetch();
    return $creditCard;
  }
 ?>
