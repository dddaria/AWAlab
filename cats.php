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
        <h1>the hidden CAT PAGE</h1>
        <form id="cats" method="get">
            <button name="breed" value="1" type="submit">Get random cat breed</button>
            <button name="fact" value="2" type="submit">Get random cat fact</button>
        </form>
        <br><br>
    </main>

    <?php 
    if(isset($_GET["breed"])) {
        $url = "https://catfact.ninja/breeds?limit=40";
        $value = $_GET["breed"];
        callCatAPI($url, $value);
    }
    else if (isset($_GET["fact"])) {
        $url = "https://catfact.ninja/fact";
        $value = $_GET["fact"];
        callCatAPI($url, $value);
    }
    ?>
</body>
</html>