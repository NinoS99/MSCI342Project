<?php
// Function to obtain mysqli connection.
    function get_mysqli_conn()
    {
        $dbhost = 'localhost';
        $dbuser = 'nspasik';
        $dbpassword = 'Fall@*%2020';
        $dbname = 'nspasik';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
        if ($mysqli->connect_errno)
        {
            echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>
