<?php
    /*
        Date Created: 2022_04_07 by Nathan Brueckner
        Date Modified: 2022_04_15 by Jenn Landicho
            Modification Details: Redesigned the page to give a more polished look.
        Date Modified: 2022_04_15 by Jenn Landicho
            Modification Details: Fixed Search function.
        Date Modified: 2022_04_23 by Nathan Brueckner
            Modification Details: Fixed Check in/check out
	    Purpose of file:
		    Display items in library for admins, plus admin controls.
    */
	session_start();
    
	if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: requestItemUser.php');
        }
        else
        {
            header('Location: requestItem.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');
?>

	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/requestItem.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
					<?php
                        require "../adminHeader.php";
                    ?>
				</nav>
			</header>
			<main>
				<br>		

                <div>
                    <input type="submit" id = "addItem" onclick="location.href='addItem.php'" value="Add Item">
                </div>
                
                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                <br>

                
                <div class="displaysearch">
                    <table id="searchtable" class="searchtable" style="color:black">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT itemID, itemName, itemSection, userID FROM item";
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['itemName'] . "<br>" . "Section: " . $row['itemSection'] . "<br>" . "</td>";
                                        echo "<td style='text-align: center'>";
                                        if($row['userID'] == 0)
                                        {
                                            echo "<form action='checkOutItem.php' method = 'POST'>
                                        <input type='hidden' name='itemID' value=\"";echo $row['itemID']; echo"\"> 

                                        

                                        <input type=submit value='Check Out Item' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
                                        }

                                        else if($row['userID'] == $_SESSION['userID'])
                                        {
                                            echo "<form action='returnItem.php' method = 'POST'>
                                        <input type='hidden' name='itemID' value=\"";echo $row['itemID']; echo"\"> 

                                        

                                        <input type=submit value='Return Item' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
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