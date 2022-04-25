<?php
    /*
        Date Created: 2022_04_07 by Nathan Brueckner
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Standardizing style across pages. Reformatted the tables, added styling to the page.
	    Purpose of file:
		    Display books in library for users
    */
	session_start();
    
	if(!isset($_SESSION['user']))
	{
        if(isset($_SESSION['admin']))
        {
            header('Location: libraryCatalogAdmin.php');
        }
        else
        {
            header('Location: libraryCatalog.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');
?>

	<html style="width: 100vw;">
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT bookID, bookISBN, bookAuthor, bookTitle, bookGenre, bookDescription, bookPublisher, bookFormat, bookSection, userID FROM book";
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['bookTitle'] . "<br>" . "by " . $row['bookAuthor'] . "<br> <br>" . $row['bookDescription'] . "<br> <br>" . "ISBN: " . $row['bookISBN'] . "<br>" . "Publisher: " . $row['bookPublisher'] . "<br>" . "Genre: " . $row['bookGenre'] . "<br>" . "Format: " . $row['bookFormat'] . "<br>" . "Section: " . $row['bookSection'] . "<br>" . "</td>";
                                        echo "<td style='text-align: center'>";
                                        if($row['userID'] == 0)
                                        {
                                            echo "<form action='checkOutBook.php' method = 'POST'>
                                        <input type='hidden' name='bookID' value=\"";echo $row['bookID']; echo"\">
                                        <input type='hidden' name='bookTitle' value=\"";echo $row['bookTitle']; echo"\"> 

                                        

                                        <input type=submit value='Check Out Book' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
                                        }

                                        else if($row['userID'] == $_SESSION['userID'])
                                        {
                                            echo "<form action='returnBook.php' method = 'POST'>
                                        <input type='hidden' name='bookID' value=\"";echo $row['bookID']; echo"\"> 

                                        

                                        <input type=submit value='Return' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
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