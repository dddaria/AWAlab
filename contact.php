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
    <?php include 'header.php';?>

    <main>
        <h1>CONTACT US</h1>
        <p>We are happy to hear from you!</p><br>
        <form id="contactform" action="post">
            <label for="fullname">Full name</label>
            <input class="contact" type="text" id="fullname" name="fullname" placeholder="Your full name"><br>

            <label for="email">Email</label>
            <input class="contact" type="text" id="email" name="email" placeholder="Your email"><br>
        
            <label for="subject">Subject</label>
            <input class="contact" type="text" id="subject" name="subject" placeholder="Subject"><br>

            <textarea id="message" name="message" placeholder="Tell us what's on your mind"></textarea><br>
            
            <input type="submit" value="Send" name="sendMessage" id="send">
      </form>

      <?php 
        //Protection from XSS
        if(isset($_POST['send'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $fullname = strip_tags($fullname);
            $email = strip_tags($email);
            $subject = strip_tags($subject);
            $message = strip_tags($message);
        };
      ?>
    </main>
    <?php include 'footer.php';?>
</body>
</html>