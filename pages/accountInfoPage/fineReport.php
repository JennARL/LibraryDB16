<?php
    /*
        Date Created: 2022_04_24 by Nathan Brueckner
	    Purpose of file:
		    Display total fines owed by all users.
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
          <?php
            require "sidenavAdmin.php"
          ?>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            <div id="profileinfo" style="height: 40%;">

                    <h2>Total Fine Report</h2>
                    <?php
                        $sql = "SELECT libraryFines FROM user";
                        $result = mysqli_query($connection, $sql);
                        $totalFines = 0;

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $totalFines = $totalFines + $row['libraryFines'];
                            }
                        }
                        echo "Total Fines: $" . $totalFines;
                    ?>
            </div>
        </div>

    </body>
</html> 