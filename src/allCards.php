<?php

  session_start();

    //define connection parameters
        $mysqli = new mysqli("localhost","nspasik", "Fall@*%2020", "nspasik"); // enter in nino's credentials for final product: ("localhost","nspasik", "Fall@*%2020", "nspasik");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        if(isset($_GET['id']))
    {
        $location =$_GET['id'];
     //   echo $location;

       // }
       // $Comp = isset($_POST["location"]);
       // echo $Comp;

        // Query DB to get all rows from team table and formate the output
        $query = "SELECT credit_card_company, credit_card_name, card_network, URL FROM credit_cards WHERE credit_card_company ='{$location}'";
        echo '<table border="1" cellspacing="2" cellpadding="2" class ="center">

    <tr>
      <td> <font face="Arial">Company </font> </td>
      <td> <font face="Arial">Credit Card Name </font> </td>
	    <td> <font face="Arial">Card Network </font> </td>
      <td> <font face="Arial">Card URL </font> </td>
      </tr>';
}
     // outputs the company, name and network corresponding to the filter applied in the webpage
        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["credit_card_company"];
		        $field2name = $row["credit_card_name"];
		        $field3name = $row["card_network"];
            $field4name = $row["URL"];

                echo '<tr>
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
		              <td>'.$field3name.'</td>
                  <td><a href="' . $field4name . '">Credit Card Website</a></td>
              </tr>';
            }

        /*freeresultset*/
        $result->free();
        }

 ?>

<html>

      <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!--Link CSS file-->
        <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>

		<!--Import relevant style sheets-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <!-- Jumbotron titlebox-->
        <div class = "jumbotron">
            <h1 class="text-primary">
            <p class="display-3">CreditSimple Credit Cards</p>
            <small class="text-muted">List of all credit cards our application can recommend!</small>
            </h1>
        </div>

    <body>
        <form method="GET">
            <label for = " ">Filter by Company:</label>
                <select name="location" onchange="window.location='allCards.php?id='+this.value+'&pos='+this.selectedIndex;">
                    <option value = " "> Select a company</option>
                    <option value = "American Express"> American Express </option>
                    <option value = "BMO">BMO</option>
                    <option value = "Capital One Canada">Capital One Canada</option>
                    <option value = "CIBC">CIBC</option>
                    <option value = "RBC">RBC</option>
                    <option value = "ScotiaBank">Scotiabank</option>
                    <option value = "TD Canada">TD Canada</option>
                    <option value = "Triangle (Canadian Tire)">Triangle (Canadian Tire)</option>
                    </select>
        </form>

    <div class="wrapper">
    <div class="row">
        <div class="fixed-bottom">
        <div class="col-sm-12">
            <a href="../src/submit.php"><button class="btn btn-danger btn-lg"></br><h1>Return to results page</h1></br></button></a>
        </div>
        </div>
    </div>
    </div>

<!--Formatting the look of the title block and buttons created above-->
    <style>
       .wrapper {
        text-align: center;
    }
      .center {
      margin-left: auto;
      margin-right: auto;
    }
        <style>
    </body>

</html>
