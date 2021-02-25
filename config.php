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

//Uploading images to the gallery page
if (isset($_POST['submitImage'])) {
    $filename = $_FILES['myFile']['name'];
    $destination = 'img/uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    echo $destination;

    //The file on a temp directory on the server
    $file = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];

    if (!in_array($extension, ['jpeg', 'png','jpg','gif'])) {
        echo "Allowed image types are: .jpeg, .png, .jpg and .gif";
    }
    else if ($file > 10000000) {
        echo "Your image is too large.";
    }
    else {
        //Moving the file to the server & adding it to the database
        if (move_uploaded_file($file, $destination)) {
            $dbConn = mysqli_connect($host, $user, $password, $database);

            $sql = " INSERT INTO image (name, size) VALUES ('$filename', '$size')";
            if(mysqli_query($dbConn, $sql)) {
                echo "File uploaded";
            }
            else {
                echo "Failed to upload file. Try again.";
            }
        }
    }
}
?>