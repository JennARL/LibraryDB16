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
            header('Location: fines.php');
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
          <?php
            require "sidenavAdmin.php"
          ?>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
                        <div id="profileinfo">
                <h2>Fines</h2>
                <table>
                    <thead>
                        <tr>
                            <td>
                                Amount Due
                            </td>
                            <td>
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT userID, libraryFines FROM user";
                        $result = mysqli_query($connection, $sql);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if($row['userID'] == $_SESSION['userID'])
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "$" . $row['libraryFines'];
                                        echo "</td>";
                                        echo "<td style='text-align:center;'>";
                                            echo "<form action='payFines.php' method = 'POST'>
                                        <input type='hidden' name='userID' value=\"";echo $row['userID']; echo"\"> 
                                        <input type='hidden' name='libraryFines' value=\"";echo $row['libraryFines']; echo"\">

                                            <input type=submit value='Pay Fines' style='margin: 0 auto; width: 75%; background-color:lightgrey; margin-bottom: 5px;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>" .
                                            "<br>" .

                                        "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
        </div>

    </body>
</html> 

