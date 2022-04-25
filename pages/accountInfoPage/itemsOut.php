<?php
    /*
        Date Created: 2022_04_23 by Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner
            Details: Connected to DB
        Purpose:
            Display items borrowed by the user.
        Sources:
            https://www.w3schools.com/php/func_date_date_add.asp#:~:text=%24date%3Ddate_create(%222013,(%24date%2C%22Y%2Dm%2Dd%22)%3B
                Adding dates.
    */
    
	session_start();
    
	if(!isset($_SESSION['user']))
	{
        if(isset($_SESSION['admin']))
        {
            header('Location: booksOutAdmin.php');
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
            require "sidenav.php"
          ?>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            <div id="profileinfo">
                <h2> Items Out</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Item Details</th>
                            <th>Expected Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT itemID, itemName, userID, checkOutDate FROM item";
                            $result = mysqli_query($connection, $sql);
                            

                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    

                                    echo "<td>";
                                    if($_SESSION['userID'] == $row['userID'])
                                    {
                                        echo "Item Name: " . $row['itemName'] . "<br>" . "Check Out Date: " . $row['checkOutDate'] . "<br> <br>";
                                    }
                                    echo "</td>";

                                    $dateOrig = $row['checkOutDate'];

                                    echo "<td>";
                                    if($_SESSION['userID'] == $row['userID'])
                                    {
                                        $date=date_create($dateOrig);
                                        date_add($date,date_interval_create_from_date_string("7 days"));
                                        echo date_format($date,"Y-m-d");
                                    }
                                    echo "</td>";

                                    echo "<td style='text-align: center'>";
                                    if($_SESSION['userID'] == $row['userID'])
                                    {
                                        echo 
                                        "<form action='returnItem.php' method = 'POST'>
                                        <input type='hidden' name='itemID' value=\"";echo $row['itemID']; echo"\"> 
                                    

                                        <input type=submit value='Return Book' style='margin: 0 auto; width: 75%; background-color:lightgrey; margin-bottom: 5px;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>" .
                                        "<br>";
                                    }

                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html> 

