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
            include "header.php";
            include "nav.html";
        ?>
        <div class="main">
            <?php
                //mostly stolen from: 
                //"https://www.w3schools.com/php/php_mysql_select.asp"
                //"https://stackoverflow.com/questions/15251095/display-data-from-sql-database-into-php-html-table"

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "login_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                /*
                $sql = "SELECT * FROM mitarbeiter";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["M_ID"] . "</td>
                            <td>" . $row["M_Name"] . "</td>
                            <td>" . $row["M_Vorname"] . "</td>
                            <td>" . $row["M_Geschlecht"] . "</td>
                            <td>" . $row["M_Gehalt"] . "</td>
                            <td>" . $row["M_Geburtstag"] . "</td>
                            <td>" . $row["M_ID"] . "</td>
                        </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                */
                $conn->close();
            ?>
            
        </div>
        <?php include "footer.html";?>
    </body>
</html>