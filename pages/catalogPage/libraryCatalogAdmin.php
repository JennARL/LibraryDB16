<?php
    /*
        Date Created: 2022_04_07 by Nathan Brueckner
        Date Modified: 2022_04_14 by Nathan Brueckner
            Description: Added tables.
        Date Modified: 2022_04_15 by nathan Brueckner
            Description: Changed the way data is presented in the table.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Restyling the page, formatted new table system.
        Date Modified: 2022_04_19 by Jenn Landicho
            Modification Details: Fixed minor styling issues. Added button to add books to catalog.
        Date Modified: 2022_04_19 by Nathan Brueckner
            Modification Details: Added check out book button.
        Date Modified: 2022_04_19 by Jenn Landicho
            Modification Details: Fixed search function.
        Date Modified: 2022_04_23 by nathan Brueckner
            Modification Details: Fixed a problem where rows were sending the last row ID in the table.
	    Purpose of file:
		    Display books in library for admins, plus admin controls.
        Source:
            https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file used a solution on this post to show me how to call the JS script created in the header folder (also learned from this post)
            https://www.w3schools.com/howto/howto_js_filter_table.asp used this to look at how to implement tables. Needed to use their script with only slight modification.
            https://www.w3schools.com/php/php_mysql_select.asp used this to look how to implement tables (source 2)
            https://stackoverflow.com/questions/34466145/text-box-only-displaying-one-word-as-value Needed source to figure out how to grab multiple words from input values.
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
                    <input type="submit" id = "addBook" onclick="location.href='addBook.php'" value="Add Book">
                    <input type="submit" id = "bookLog" onclick="location.href='../bookLogPage/bookLog.php'" value="View Book Log">
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

                                $sql = "SELECT bookID, bookISBN, bookTitle, bookAuthor, bookDescription, bookPublisher, bookGenre, bookFormat, bookSection, userID FROM book";
                                $sql2 = "SELECT userID, userUsername FROM user";
                                $result = mysqli_query($connection, $sql);
                                $result2 = mysqli_query($connection, $sql2);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['bookTitle'] . "<br>" . "by " . $row['bookAuthor'] . "<br> <br>" . $row['bookDescription'] . "<br> <br>" . "ISBN: " . $row['bookISBN'] . "<br>" . "Publisher: " . $row['bookPublisher'] . "<br>" . "Genre: " . $row['bookGenre'] . "<br>" . "Format: " . $row['bookFormat'] . "<br>" . "Section: " . $row['bookSection'] . "<br>" . "User: " . $row['userID'] . "</td>";
                                        echo 
                                        "<td style='text-align: center'>" . "<form action='editBook.php' method = 'POST'>
                                        <input type='hidden' name='bookID' value=\"";echo $row['bookID']; echo"\"> 
                                        <input type='hidden' name='bookISBN' value=\"";echo $row['bookISBN']; echo"\">
                                        <input type='hidden' name='bookTitle' value=\"";echo $row['bookTitle']; echo"\">  
                                        <input type='hidden' name='bookAuthor' value=\"";echo $row['bookAuthor']; echo"\"> 
                                        <input type='hidden' name='bookDescription' value=\"";echo $row['bookDescription']; echo"\"> 
                                        <input type='hidden' name='bookPublisher' value=\"";echo $row['bookPublisher']; echo"\"> 
                                        <input type='hidden' name='bookGenre' value=\"";echo $row['bookGenre']; echo"\"> 
                                        <input type='hidden' name='bookFormat' value=\"";echo $row['bookFormat']; echo"\"> 
                                        <input type='hidden' name='bookSection' value=\"";echo $row['bookSection']; echo"\">

                                        

                                        <input type=submit value='Edit' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
                                        echo 
                                        "<form action='deleteBook.php' method = 'POST'>
                                        <input type='hidden' name='bookID' value=\"";echo $row['bookID']; echo"\"> 
                                        <input type='hidden' name='bookISBN' value=\"";echo $row['bookISBN']; echo"\">
                                        <input type='hidden' name='bookTitle' value=\"";echo $row['bookTitle']; echo"\">  
                                        <input type='hidden' name='bookAuthor' value=\"";echo $row['bookAuthor']; echo"\"> 
                                        <input type='hidden' name='bookDescription' value=\"";echo $row['bookDescription']; echo"\"> 
                                        <input type='hidden' name='bookPublisher' value=\"";echo $row['bookPublisher']; echo"\"> 
                                        <input type='hidden' name='bookGenre' value=\"";echo $row['bookGenre']; echo"\"> 
                                        <input type='hidden' name='bookFormat' value=\"";echo $row['bookFormat']; echo"\">
                                        
                                        
                                        <input type=submit value='Delete' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                                                           border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";


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

                                        

                                        <input type=submit value='Return Book' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>";
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