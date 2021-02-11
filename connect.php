<?php

//Connecting to database
$dbConn = mysqli_connect($host, $user, $password, $database);

//Error management
if($dbConn->connect_errno) {
    echo "Failed to connect to database:" . $dbConn->connect_error;
};
//echo "Connected successfully";

//Function for reserving books
function reserve($reserve,$BookID){
    include ('config.php');
    // Create connection
    $dbConn = mysqli_connect($host, $user, $password, $database);
    //Check connection
    if($dbConn->connect_errno) {
        echo "Failed to connect to database:" . $dbConn->connect_error;
    }; 
 
    $sql = "UPDATE Book SET Status='{$reserve}' WHERE BookID='{$BookID}'";
    if ($dbConn->query($sql) === FALSE) {
        echo "Error updating record: " . $dbConn->error;
    }
    $dbConn->close();
}  

?>

