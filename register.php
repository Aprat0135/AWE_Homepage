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
            <?php
                // already logged in
                if(isset($_SESSION['user'])) {
                    echo "You are already logged in as " . $_SESSION['user'] . ".<br>";
                }
                else {
                    // if user is set
                    if(!empty($_POST['user']) {
                        // if PWs are set
                        if(!empty($_POST['pw']) {
                            // hash PWs
                            $pw = sha1($_POST['pw']);
                            $pw2 = sha1($_POST['pw2']);

                            // check pw
                            if($pw == $pw2) {
                                // Create connection
                                $conn = new mysqli('localhost', 'root', '', 'logindb');
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // instead of $user = $_POST['user'];
                                $user = $conn->real_escape_string(strip_tags(filter_input(INPUT_POST, "user")));

                                $newUser = true;
                                $result = $conn->query("SELECT username FROM userdata WHERE username = '$user'");
                                if ($result) {
                                    if ($row = $result->fetch_array()) {
                                        echo "username already exists in database.<br>";
                                        echo "<a href='register.php'>Register</a><br>";
                                        $newUser = false;
                                    }
                                }

                                if ($newUser) {
                                    if ($conn->query("INSERT INTO userdata (username, password) VALUES ('$user', '$pw')")) {
                                        echo "User $user has been registered.";
                                    }
                                }

                                $conn->close();
                            }
                            else {
                                echo "passwords have to be identical.<br>";
                                echo "<a href='register.php'>Register</a><br>";
                            }
                        }
                        else {
                            echo "passwords musn't be empty.<br>";
                            echo "<a href='register.php'>Register</a><br>";
                        }
                    }
                    else {
                        include 'inc/registerForm.html';
                    }
                }
            ?>
        </div>
        <?php include "inc/footer.html";?>
    </body>
</html>