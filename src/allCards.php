<?php

  session_start();

    //define connection parameters 
        $mysqli = new mysqli("localhost","nspasik", "Fall@*%2020", "nspasik"); // enter in nino's credentials for final product: ("localhost","nspasik", "Fall@*%2020", "nspasik");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // Query DB to get all rows from team table and formate the output 
        $query = "SELECT * FROM credit_cards";
        echo '<table border="1" cellspacing="2" cellpadding="2"> 
    
    
    <tr> 
      <td> <font face="Arial">Company </font> </td> 
      <td> <font face="Arial">Credit Card Name </font> </td> 
	  <td> <font face="Arial">Card Network </font> </td> 
      </tr>';

     // outputs the value in the webpage excluding the ID column
        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["credit_card_company"];
		        $field2name = $row["credit_card_name"];
		        $field3name = $row["card_network"];

                echo '<tr> 
                  <td>'.$field1name.'</td>  
                  <td>'.$field2name.'</td> 
		          <td>'.$field3name.'</td> 
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
            </h1>
        </div>

</html>
