<?php
    session_start();
    //Checking if the user is admin or not
    // if (isset($_SESSION["usertype"]) == "admin") {
    //     header("Location: http://localhost/lab1/admin.php", true, 301);
    // }
    // else {
    //     //if the user is not admin they can't access the page
    //     header("Location: http://localhost/lab1/blocked.php", true, 301);
    // };
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include 'header.php';
    ?>
    <main>
        <h1>WELCOME ADMIN!</h1>
        <p>Here you can upload pictures to the Gallery!</p><br>
        <form id="fileUpload" name="fileUpload" method="post" enctype="multipart/form-data">
            Select image to upload: <br>
            <input type="file" name="myFile" id="myFile">
            <input type="submit" value="Upload Image" name="submitImage">
        </form>
        <?php 
            if (isset($_POST['submitImage'])) {
                fileUpload($_FILES['myFile']);
            }
        ?>
    </main>
    <?php include 'footer.php';?>
</body>
</html>