<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include 'header.php';
    ?>

    <main>
        <h1>Welcome Admin!</h1>
        <p>Here you can upload pictures to the Gallery!</p><br>
        <form id="fileUpload" action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload: <br>
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" value="Upload Image" name="submit">
</form>
    </main>

    <footer>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </footer>
</body>
</html>