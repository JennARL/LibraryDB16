<?php
    /*
        Date Created: 2022_04_17 by Jenn Landicho
	    Purpose of file:
		    Display deleted books in library for admins, plus admin controls.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Reformatted the tables, added styling to the page.
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
			<link rel="stylesheet" href="../../styling/deletedLog.css">
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
                    <input type="submit" id="backbutton" onclick="location.href='bookLog.php'" value="Back">
                </div>	
                
                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                <br>

                
                <div class="displaysearch">
                    <table id="searchtable" class="searchtable" style="color:black">
                        <thead>
                            <tr>
                                <th>Deleted Item Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT bookISBN, bookAuthor, bookTitle, bookGenre, bookDescription, bookPublisher, bookFormat, reasonDeleted, dateDeleted FROM deletedbook";
                                $result = mysqli_query($connection, $sql);
                                

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . "Book ISBN: " . $row['bookISBN'] . "<br>" . "Book Author: " . $row['bookAuthor'] . "<br>" . "Book Title: " . $row['bookTitle'] . "<br>" . "Book Genre: " . $row['bookGenre'] . "<br>" . "Book Description: " . $row['bookDescription'] . "<br>" . "Book Publisher: " . $row['bookPublisher'] . "<br>" . "Book Format: " . $row['bookFormat'] . "<br>" . "Reason Deleted: " . $row['reasonDeleted'] . "<br>" . "Date Deleted: " . $row['dateDeleted'] . "</td>";
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
