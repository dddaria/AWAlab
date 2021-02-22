<?php 
$currentPage = basename($_SERVER['PHP_SELF']);

//Variables for database connection
$host = "localhost";
$user = "root"; //name of the DB user
$password = ""; //password of the DB user
$database = "bookDB"; //database name

//Checking if the user has logged in
if(isset($_SESSION["userIP"])) {
    //Checking if session isn't hijacked
    if($_SESSION["userIP"] !== $_SERVER['REMOTE_ADDR']) {
        //If session is hijacked, destroy it
        session_unset();
        session_destroy();
        //Start new session
        session_start();
    };
};
?>