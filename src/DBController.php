<?php
// class is for strictly the excel export feature
class DBController {
	private $host = "localhost";
	private $user = "nspasik";
	private $password = "Fall@*%2020";
	private $database = "nspasik";
	private $conn;
	
        function __construct() {
        $this->conn = $this->connectDB();
	}	
    
	    function connectDB() {
		  $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		  return $conn;
	}
    
    // get the information for the matched credit card
        function runQuery($query) {
                $result = mysqli_query($this->conn,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }		
                if(!empty($resultset))
                return $resultset;
	}
}
?>