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
        include 'config.php';
        include 'connect.php';
        include 'header.php';
    ?>
    <main>
        <h1>MY BOOKS</h1>
        <section>
        <?php
            $stmt = $dbConn->prepare("SELECT b.Title, a.FirstName, a.LastName, b.Pages, b.isbn, b.BookID
            FROM Book AS b
            JOIN BookAuthor AS ba ON b.BookID = ba.BookID
            JOIN Author AS a ON ba.AuthorID = a.AuthorID
            WHERE b.Status = 1");
            
            //Putting the results into variables
            $stmt->bind_result($Title, $FirstName, $LastName, $Pages, $ISBN, $BookID);
            $stmt->execute();

            //Creating table
            echo '<table id="booktable">';
            echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Author</th>";
            echo "<th>Number of Pages</th>";
            echo "<th>ISBN</th>";
            echo "<th>Reservation</th>";
            echo "</tr>";

            //Putting all the results in the table
            while ($stmt->fetch()) {
                echo "<tr>";
                echo "<td>".$Title."</td>";
                echo "<td>".$FirstName." "."$LastName</td>";
                echo "<td>".$Pages."</td>";
                echo "<td>".$ISBN."</td>";
                echo "<td>
                <form method='post'>
                <input type='hidden' name='BookID' value=$BookID />
                <button name='reserve' value=0>Unreserve</button>
                </form>
                </td>";
            };
            echo "</table>";

            //If unreserve is pushed the function runs
            if(isset($_POST['reserve'])){
                reserve($_POST['reserve'],$_POST['BookID']);
                echo "<meta http-equiv='refresh' content='0'>";
 
            }

            mysqli_close($dbConn);
        ?>
        </section>

    </main>
    <footer>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </footer>
</body>
</html>