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
        <ul id="bookcovers">
        <?php
            //selecting the image-names from DB
            $stmt = $dbConn->prepare("SELECT name FROM image");
            
            //Putting the names into variables
            $stmt->bind_result($filename);
            $stmt->execute();

            //Putting the names as a part of img-src
            while ($stmt->fetch()) {
                echo "<li class='book'><img src=img/uploads/".$filename."></li>";
            };
        ?>
        </ul>
    </main>
    <?php include 'footer.php';?>
</body>
</html>