<?php
?>

<html>
    <head>
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        <!--Link CSS file-->
        <link rel="stylesheet" href="style.css">
        
	<!--End head-->
    </head>

    <body>
        
        <!-- Jumbotron titlebox-->
        <div class = "jumbotron">
            <h1 class="text-primary">
            <p class="display-3">CreditSimple KnowledgeBase</p>
            <small class="text-muted">Select which category you would like to learn more about!</small>
            </h1>
        </div>
    
<!--Button to allow user to go back to different pages on the knowledge base or return to homepage-->
    <div class="wrapper">
      <a href="howCreditCardsworks.php"><button class="buttonKB"><h2>How Credit Cards Work</h2></button></a>
      <a href="creditCardCompanies.php"><button class="buttonKB"><h2>Credit Card Companies </h2></button></a>
      <a href="typesOfCreditCards.php"><button class="buttonKB"><h2>Types of Credit Cards</h2></button></a>
      <a href="creditCardFees.php"><button class="buttonKB"><h2>Types of Fees</h2></button></a>
      <a href="creditCardApplications.php"><button class="buttonKB"><h2>How Applications Work</h2></button></a>
      <a href="creditCardRewardPrograms.php"><button class="buttonKB"><h2>Reward Programs</h2></button></a>
      <a href="index.php"><button class="buttonReturn"><h1>Return to Homepage</h1></button></a>
    </div>

<!--Formatting the look of the title block and buttons created above-->
<style>
   .wrapper {
    text-align: center;
}
   div.title {
         background-color: #8FC9FF;
         width: 658px;
         height: 119px;
         left: 402px;
         top: 64.5px; 
         margin-left: auto;
         margin-right: auto;
         width: 50%;
        }
    
    .buttonKB {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
       margin:20px auto;
    }
    .buttonReturn {
        background-color: #EA7E77;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
    }
</style>
    
    <body>

</html>