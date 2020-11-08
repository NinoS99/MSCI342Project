<?php
?>

<html>
    <head>
    <!--Create text styles-->
		<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
		<!--Import relevant style sheets-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<!--End head-->
    </head>

    <body>
        <!--Title block-->
        <div class="title">
            <center>
            </br><h1>CreditSimple Knowledge Base</h1></br>
        </div>
    
<!--Show user to select one of the categories-->
        <h2> Select which category you would like to learn more about! </h2>
    
<!--Button to allow user to go back to different pages on the knowledge base or return to homepage-->
    <div class="wrapper">
      <a href="howCreditCardsworks.php"><button class="buttonHCCW"><h1>How Credit Cards Work</h1></button></a>
      <a href="creditCardCompanies.php"><button class="buttonCCC"><h1>Credit Card Companies </h1></button></a>
      <a href="typesOfCreditCards.php"><button class="buttonTOCC"><h1>Types of Credit Cards</h1></button></a>
      <a href="creditCardFees.php"><button class="buttonCCF"><h1>Types of Fees</h1></button></a>
      <a href="creditCardApplications.php"><button class="buttonCCA"><h1>Credit Card Applications</h1></button></a>
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
    
    .buttonHCCW {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
       margin:120px auto;
    }
    
    .buttonCCC {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
        margin:120px auto;
    }
    .buttonTOCC {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
        margin:120px auto; 
    }
     .buttonCCF {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
    }
     .buttonCCA {
        background-color: #DCF790;
        border: none;
        text-align: center;
        width: 400px;
        height: 100px;
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