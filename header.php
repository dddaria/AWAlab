<?php include 'config.php' ?>
<header>
        <nav>
            <ul>
                <li><a href="index.php" class="<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'activelink' : ''?>">Home</a></li>
                <li><a href="about.php" class="<?php echo($currentPage == 'about.php') ? 'activelink' : ''?>">About Me</a></li>
                <li><a href="browse.php" class="<?php echo($currentPage == 'browse.php') ? 'activelink' : ''?>">Browse Books</a></li>
                <li><a href="mybooks.php" class="<?php echo($currentPage == 'mybooks.php') ? 'activelink' : ''?>">My Books</a></li>
                <li><a href="contact.php" class="<?php echo($currentPage == 'contact.php') ? 'activelink' : ''?>">Contact</a></li>
            </ul>
        </nav>
        <img src="img/headerpic.jpg" alt="book picture" id="headerimg">
</header>

