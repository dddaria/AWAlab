<?php

//Connecting to database
$dbConn = mysqli_connect($host, $user, $password, $database);

//Error management
if($dbConn->connect_errno) {
    echo "Failed to connect to database:" . $dbConn->connect_error;
};
//echo "Connected successfully"; 

?>

