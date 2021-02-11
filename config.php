<?php 
$currentPage = basename($_SERVER['PHP_SELF']);

//Variables for database connection
$host = "localhost";
$user = "root"; //name of the DB user
$password = ""; //password of the DB user
$database = "bookDB"; //database name

//session_start();

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
    if ($dbConn->query($sql) === TRUE) {
        echo "Record updated successfully";
    }
    else {
        echo "Error updating record: " . $dbConn->error;
    }
    $dbConn->close();
}  

?>