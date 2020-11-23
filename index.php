
<?php
?>
<html>
	<!--Start head-->
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
            <p class="display-3">Welcome to CreditSimple!</p>
            <small class="text-muted">Your virtual credit card advisor</small>
            </h1>
        </div>

        <!-- Spacing between titlebox and button-->
    <span style="display:block; height: 150;"></span>

    <!--Creating the buttons to the login page-->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-6">
                <a href="src/surveyPage.php"><button class="btn btn-success btn-lg"></br><h2>Find your ideal credit card!</h2></br></button></a>
            </div>
            <div class="col-sm-6">
                <a href="knowledgeBase.php"><button class="btn btn-success btn-lg"></br><h2>CreditSimple KnowledgeBase</h2></br></button></a>
            </div>
        </div>
    </div>


    <!--Formatting the look of the buttons-->
    <style>
    .wrapper {
        text-align: center;
    }
    </style>
	</body>

</html>
