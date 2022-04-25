<?php
    /* 
        Date Created: 2022_03 by Kenneth Dang
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Added notation. Added session and page redirection logic.
        Date Modified: 2022_04_15 by Jenn Landicho
            Modification Details: Redesigned the page to give a more polished look.
        Date Modified: 2022_04_24 by Nathan Brueckner
            Modification Details: 
        Purpose:
            Allow user to check out items. In this case, no items can be checked out, they can only be viewed, because the viewer is not logged in.
    */
    session_start();

	if(isset($_SESSION['admin']))
	{
		header('Location: requestItemAdmin.php');
	}
	else if(isset($_SESSION['user']))
	{
		header('Location: requestItemUser.php');
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
                        require "../header.php";
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
                                <th>Item</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT itemName, itemSection FROM item";
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['itemName'] . "<br>" . "Section: " . $row['itemSection'] . "</td>";
                                        echo 
                                        "<td style='text-align: center'>" . "<br>" . "<a href='https://www.cosc3380team16.online/pages/loginPage/login.php'><input type=submit value='Login' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                      border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'>" .
                                        "<br>" .
                                        "<br>" .
                                        "</td>";
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