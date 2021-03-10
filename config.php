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

//Function for reserving books
function reserve($reserve,$BookID){
    // Create connection
    $dbConn = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);
    //Check connection
    if($dbConn->connect_errno) {
        echo "Failed to connect to database:" . $dbConn->connect_error;
    }; 
 
    $sql = "UPDATE Book SET Status='{$reserve}' WHERE BookID='{$BookID}'";
    if ($dbConn->query($sql) === FALSE) {
        echo "Error updating record: " . $dbConn->error;
    }
    $dbConn->close();
};

//Uploading images to the gallery page
function fileUpload($file) {
    $filename = $_FILES['myFile']['name'];
    $destination = 'img/uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    //The file on a temp directory on the server
    $file = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];

    if (!in_array($extension, ['jpeg', 'png','jpg','gif', 'PNG', 'JPG', 'GIF', 'JPEG'])) {
        echo "<br><p class='warning'>Allowed image types are: .jpeg, .png, .jpg and .gif</p>";
    }
    else if ($size > 10000000) {
        echo "<br><p class='warning'>Your image is too large.</p>";
    }
    else {
        //Moving the file to the server & adding it to the database
        if (move_uploaded_file($file, $destination)) {
            $dbConn = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);

            $sql = " INSERT INTO image (name, size) VALUES ('$filename', '$size')";
            if(mysqli_query($dbConn, $sql)) {
                echo "<br><p>File uploaded</p>";
            }
            else {
                echo "<br><p class='warning'>Failed to upload file. Try again.</p>";
            }
        }
    }
};

//Getting info from API function
function callCatAPI($url, $value) {
    //starting the call
    $cURLconn = curl_init();

    //Setting headers
    curl_setopt($cURLconn, CURLOPT_URL, $url);
    curl_setopt($cURLconn, CURLOPT_RETURNTRANSFER, true);

    //recieving response
    $JSONresponse = curl_exec($cURLconn);
    curl_close($cURLconn);
    
    //decoding the response
    $response = json_decode($JSONresponse);
    
    //Checking if the user asked for breed/fact
    if ($value == 1) {
        //printing the random cat breed
        echo "<p>" . $response->data[rand(0,40)]->breed . "</p>";
    }
    else if ($value == 2) {
        //printing the fact
        echo "<p>" . $response->fact . "</p>";
    }
};
?>