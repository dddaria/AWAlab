<?php session_start();?>
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
        include 'connect.php';
    ?>
    <main>
        <h1>GALLERY</h1>
        <p>Browse book covers here!</p>
        <table>
        </table>
    </main>
    <?php include 'footer.php';?>
</body>
</html>