<header>
    <div>
        <?php
            if(isset($_SESSION['user'])) {
                echo $_SESSION['user']." ";
                echo '<a href="?add=logout">logout</a>';
            }
            else {
                echo 'guest';
                echo '<a href="index.php">login</a>';
            }
            //logout
            if(isset($_GET['add']) && $_GET['add'] == 'logout') {
                session_unset();
                session_destroy();
            }
        ?>
    </div>
</header>