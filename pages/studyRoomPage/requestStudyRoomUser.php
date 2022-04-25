<?php
    /*
        Date Created: 2022_04_07 by Nathan Brueckner
	    Purpose of file:
		    Display study rooms in library for users.
        Date Modified: 2022_04_15 by Jenn Landicho
            Modification Details: Redesigned the page to give a more polished look.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Reformatted the tables, added styling to the page.
        Date Modified: 2022_04_19 by Jenn Landicho
            Modification Details: Standardizing style across pages
    */
	session_start();
    
	if(!isset($_SESSION['user']))
	{
        if(isset($_SESSION['admin']))
        {
            header('Location: requestStudyRoomAdmin.php');
        }
        else
        {
            header('Location: requestStudyRoom.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');

?>

	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/requestStudyRoom.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
					<?php
                        require "../userHeader.php";
                    ?>
				</nav>
			</header>
			<main>
				
                <br>		
                
                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                <br>

                
                <div class="displaysearch">
                    <table id="searchtable" class="searchtable" style="color:black">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Checkout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT roomID, roomCapacity, roomAccommodations, roomAvailable FROM studyRoom";
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . "Room " . $row['roomID'] . "<br> <br>" . "Capacity: " . $row['roomCapacity'] . " People" . "<br>" . "Accommodations: " . $row['roomAccommodations'] . "<br>" . "Available: " . $row['roomAvailable'] . "<br> <br>" . "</td>";
                                        echo "<td style='text-align: center;'>";
                                        if($row['roomAvailable'] == 0)
                                        {
                                            echo "<form action='reserveStudyRoom.php' method = 'POST'>
                                        <input type='hidden' name='roomID' value=\"";echo $row['roomID']; echo"\"> 

                                        

                                        <input type=submit value='Reserve Room' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
                                        }

                                        else if($row['roomAvailable'] == $_SESSION['userID'])
                                        {
                                            echo "<form action='leaveStudyRoom.php' method = 'POST'>
                                        <input type='hidden' name='roomID' value=\"";echo $row['roomID']; echo"\"> 

                                        

                                        <input type=submit value='Leave Room' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                      </table>  
                </div>
			</main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>

<script>
    function searchFunction() 
    {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchtable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) 
        {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) 
            {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                    tr[i].style.display = "";
                } 
                else 
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>