<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AWE Homepage</title>
        <link rel="stylesheet" href="css/Stylesheet.css">
        <meta charset="utf-8" lang="de">
    </head>
    <body>
        <?php 
            include "inc/header.php";
            include "inc/nav.html";
        ?>
        <div class="main">
            <div class="div_login">
                <?php
                    //login
                    if(isset($_POST['user']) && !(empty($_POST['user']))) {
                        $_SESSION['user'] = $_POST['user'];
                    }
                    if (isset($_SESSION['user'])) {
                        echo "Hello " . $_SESSION['user'] . ". You are logged in.";
                    } else {
                        echo "Hello guest.";
                        include 'inc/login.html';
                    }
                ?>
            </div>
            <img src="img\Hellraiser.png" alt="img\Hellraiser.png">
        </div>
        <?php include "inc/footer.html";?>
    </body>
</html>