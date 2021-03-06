<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
<body>
    <?php
        include 'header.php';
        include 'connect.php';
    ?>

    <main>
        <h1>LOG IN</h1>
        <form method='post' id="login-form">
            <input name="username" placeholder="Username" required></input><br>
            <input name="password" placeholder="Password" type="password" required></input><br>
            <button name="login" type="submit" id="login" value="submit">Log in</button>
        </form>
        
        <?php 
            if(isset($_POST['username']) && isset($_POST['password'])) {
                //Preventing SQL injection
                $username = mysqli_real_escape_string($dbConn, $_POST['username']);
                $password = mysqli_real_escape_string($dbConn, $_POST['password']);

                $sql = "SELECT username, usertype FROM person WHERE username = '{$username}' AND password = '{$password}'";
                $stmt = $dbConn->prepare($sql);
                $stmt->bind_result($uname, $utype);
                $stmt->execute();

                $stmt->fetch();
                $_SESSION["username"] = $uname;
                $_SESSION["usertype"] = $utype;

                if($uname == NULL) {
                    echo '<p class="warning"><br>Username or Password incorrect. Try again.</p>';
                };

                //userIP session-variable to prevent session hijacking
                $_SESSION["userIP"] = $_SERVER['REMOTE_ADDR'];
                $stmt->close();
            };

            //If admin logs in, redirect to admin page
            if (isset($_SESSION["usertype"]) == "admin") {
                header("Location: http://localhost/lab1/admin.php", true, 301);
            };
        ?>
    </main>

    <?php include 'footer.php';?>
</body>
</html>