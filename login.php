<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">

<body>
    <?php
        include 'config.php';
        include 'connect.php';
        include 'header.php';
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

                $sql = "SELECT firstName, lastName FROM person WHERE username = '{$username}' AND password = '{$password}'";
                $stmt = $dbConn->prepare($sql);
                $stmt->bind_result($fname, $lname);
                $stmt->execute();
                
                echo "<table>";
                while($stmt->fetch()) {
                    echo "<tr>";
                    echo "<td> $fname </td><td> $lname </td>";
                    echo "</tr>";
                }
                echo "</table>";
                $stmt->close();
            }
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