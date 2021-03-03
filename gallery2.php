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
    <?php include 'config.php';?>
    <main>
        <h1>PHOTO GALLERY</h1>
        <form method="get"> 
            <button id="galleryBtn" type="submit" name="newImg" value="1">Add new random image to gallery</button>
        </form>
        <ul id="picGallery">
        <?php
            //Adding new random img to the gallery
            if (isset($_GET["newImg"])) {
                echo '<li><img src="https://picsum.photos/800"</li>';
            };

            //Showing img in gallery
            $url = "https://picsum.photos/v2/list";
            //starting the call
            $cURLconn = curl_init();

            //Setting headers
            curl_setopt($cURLconn, CURLOPT_URL, $url);
            curl_setopt($cURLconn, CURLOPT_RETURNTRANSFER, true);

            //recieving response
            $JSONresponse = curl_exec($cURLconn);
            curl_close($cURLconn);
            $response = json_decode($JSONresponse);

            //Putting the link to image as img-src
            for ($i = 0; $i < count($response); $i++) {
                echo "<li><img src='".$response[$i]->download_url."'></li>";
            };
        ?>
        </ul>
    </main>
</body>
</html>