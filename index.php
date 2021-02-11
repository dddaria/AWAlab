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
        include 'connect.php';
    ?>
    <main>
        <h1>HOMEPAGE</h1>
        <p>My paragraph</p>
        <?php
            echo $_SESSION["username"];
            echo $_SESSION['usertype'];
            echo $_SESSION['userIP'];
        ?>
    </main>
    <footer>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </footer>
</body>
</html>