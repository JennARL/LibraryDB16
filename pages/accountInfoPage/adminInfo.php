<?php
/*
    Date Created: 2022_04_23 by Jenn
    Date Modified: 2022_04_23 by Nathan Brueckner
        Description: connecting frontend to database.

*/
    session_start();
    if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: userInfo.php');
        }
        else
        {
            header('Location: index.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Texan Cougarways
        </title>
        <link rel="stylesheet" href="Info.css">
    </head>
    <body>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="userInfo.php">Profile</a>
            <a href="booksOut.php">Books Out</a>
            <a href="itemsOut.php">Items Out</a>
            <a href="fines.php">Fines</a>
            <a href="reports.php">Reports</a>
            <br>

            <a href="../../../adminPortal.php">Home</a>

            <script>
            function openNav() 
            {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
            }

            function closeNav() 
            {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
            }
        </script>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            
            <div id="profileinfo">
                <h2>User Info</h2>
                <table>
                    <tbody>
                        <?php

                        $sql = "SELECT userID, userFirstName, userLastName, itemsCheckedOut, booksCheckedOut, libraryFines FROM user";
                        $result = mysqli_query($connection, $sql);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if($row['userID'] == $_SESSION['userID'])
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "Name: ";
                                        echo "</td>";
                                        echo "<td>";
                                            echo $row['userFirstName'] . " " . $row['userLastName'];
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "# Books Checked Out: ";
                                        echo "</td>";
                                        echo "<td>";
                                            echo $row['booksCheckedOut'];
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "# Items Checked Out: ";
                                        echo "</td>";
                                        echo "<td>";
                                            echo $row['itemsCheckedOut'];
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "Fines Owed: ";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "$" . $row['libraryFines'];
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html> 

