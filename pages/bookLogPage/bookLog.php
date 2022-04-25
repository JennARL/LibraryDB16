<?php
    /*
        Date Created: 2022_04_17 by Jenn Landicho
	    Purpose of file:
		    Display book transaction history in library for admins, plus admin controls.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Reformatted the tables, added styling to the page.
        Date Modified: 2022_04_18 by Nathan Brueckner
            Modification Details: Changed some queries to the db.
        Source:
            https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file used a solution on this post to show me how to call the JS script created in the header folder (also learned from this post)
            https://www.w3schools.com/howto/howto_js_filter_table.asp used this to look at how to implement tables. Needed to use their script with only slight modification.
            https://www.w3schools.com/php/php_mysql_select.asp used this to look how to implement tables (source 2)
    */

	session_start();
    
	if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: libraryCatalogUser.php');
        }
        else
        {
            header('Location: libraryCatalog.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');

?>

	<html style="width: 100vw">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/libraryCatalog.css">
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

                <div style="display: block; margin: auto; text-align:center;">
                    <input type="submit" id = "backbutton" onclick="location.href='../catalogPage/libraryCatalogAdmin.php'" value="Back">
                    <input type="submit" id = "bookLog" onclick="location.href='deletedBookLog.php'" value="View Deleted Books">
                </div>	
                
                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                <br>

                
                <div class="displaysearch">
                    <table id="searchtable" class="searchtable" style="color:black">
                        <thead>
                            <tr>
                                <th>Transaction Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT transactionID, bookID, userID, date, transactionType FROM booktransaction";
                                $result = mysqli_query($connection, $sql);
                                

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . "Transaction ID: " . $row['transactionID'] . "<br>" . "Book ID: " . $row['bookID'] . "<br>" . "User ID: " . $row['userID'] . "<br>" . "Date: " . $row['date'] . "<br>" . "Transaction Type: " . $row['transactionType'] . "</td>";
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
