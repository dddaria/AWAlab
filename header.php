<?php include 'config.php' ?>
<header>
        <nav>
            <h2>BOOKIFY</h2>
            <ul>
                <li><a href="index.php" class="<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'activelink' : ''?>">Home</a></li>
                <li><a href="about.php" class="<?php echo($currentPage == 'about.php') ? 'activelink' : ''?>">About Bookify</a></li>
                <li><a href="browse.php" class="<?php echo($currentPage == 'browse.php') ? 'activelink' : ''?>">Browse Books</a></li>
                <li><a href="gallery.php" class="<?php echo($currentPage == 'gallery.php') ? 'activelink' : ''?>">Gallery</a></li>
                <li><a href="mybooks.php" class="<?php echo($currentPage == 'mybooks.php') ? 'activelink' : ''?>">My Books</a></li>
                <li><a href="contact.php" class="<?php echo($currentPage == 'contact.php') ? 'activelink' : ''?>">Contact</a></li>
                <?php
                    if(isset($_SESSION["username"])) {
                        if($currentPage == 'admin.php') {
                            echo "<li><a href='admin.php' class='activelink'>Admin</a></li>";
                        }
                        else {
                            echo "<li><a href='admin.php'>Admin</a></li>";
                        }
                        echo "<li><a href='logout.php'>Log out</a></li>";
                    }
                    else {
                        if($currentPage == 'login.php') {
                            echo "<li><a href='login.php' class='activelink'>Log in</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php' class=''>Log in</a></li>";
                        }
                    };
                
                ?>
            </ul>
        </nav>
        <img src="img/headerpic.jpg" alt="book picture" id="headerimg">
</header>

