<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">

<body>
    <?php
        //include 'config.php';
        //include 'connect.php';
        include 'header.php';
    ?>

    <main>
        <h1>LOG IN</h1>
        <form method='' id="login-form">
            <input name="username" placeholder="Username"></input><br>
            <input name="password" placeholder="Password"></input>
        </form>
        <button type="submit" form="login-form" value="submit">Log in</button>


    </main>

    <footer>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </footer>
</body>
</html>