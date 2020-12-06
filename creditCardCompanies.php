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

        <!--Create text styles-->
        <style type = "text/css"> h1 {color:black}</style>
        <style type = "text/css"> h2 {color:black}</style>
        
		<!--Import relevant style sheets-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!--End head-->
    </head>

    <body>  
        <!-- Jumbotron titlebox-->
        <div class = "jumbotron">
            <h1 class="text-primary">
            <p class="display-3">CreditSimple Knowledge Base</p>
            <small class="text-muted">Credit Card Companies</small>
            </h1>
        </div>
    <!--List major credit card companies with corresponding photos-->
    <center>   
    <h2 class="display-4 text-success"> Below are the top three credit card companies! Click on them to learn more!</h2> <br>
    
    <div class="wrapper">
        <br> <a href="https://www.visa.ca/en_CA"><img src="visa.jpg"></a> <br>
    </div>
    <div class="wrapper">
        <a href="https://www.mastercard.ca/en-ca.html"><img src="mastercard.jpg" style="width:394px;height:222px;"></a> <br>
    </div>
    <div class="wrapper">
        <a href="https://www.americanexpress.com/ca/"><img src="amex.jpeg" style="width:394px;height:222px;"></a>
    </div>
    <!--Button to allow user to go back to the knowledge base page-->
    <div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <a href="knowledgeBase.php"><button class="btn btn-danger btn-lg"></br><h2>Return to CreditSimple Knowledge Base</h2></br></button></a>
        </div>
    </div>

<!--Formatting the look of the title block and return button-->
<style>
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
    .wrapper {
        text-align: center;
        padding-top: 25px;
        padding-bottom: 25px;
    }
</style>
    
    <body>

</html>