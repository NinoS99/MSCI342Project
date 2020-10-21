<?php
// Function to obtain mysqli connection.
    function get_mysqli_conn()
    {
        $dbhost = 'mansci-db.uwaterloo.ca';
        $dbuser = 'nspasik';
        $dbpassword = 'Fall@*%2020';
        $dbname = 'study_buddy_tool';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
        if ($mysqli->connect_errno)
        {
            echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>
