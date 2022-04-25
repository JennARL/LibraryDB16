<?php
    /*
        Date Created: 2022_03 by Kenneth Dang
        Date Modified: 2022_04 by Kenneth Dang
        Date Modified: 2022_04_03 by Nathan Brueckner
            Modification Details: Changed naming conventions of files and file structure, meaning updates needed for links.
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Changed header call to header.php instead of calling each link here.
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Added session and page redirection logic.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Restyling the page, formatted new table system.
        Date Modified: 2022_04_24 by Nathan Brueckner
            Modification Details: Changed "checkout" buttons to "login" buttons
        Purpose of file:
            Display books in library.
    */
	session_start();
    //echo $_SESSION['admin'];
    //print_r($_SESSION);
	if(isset($_SESSION['admin']))
	{
		header('Location: libraryCatalogAdmin.php');
	}
	else if(isset($_SESSION['user']))
	{
		header('Location: libraryCatalogUser.php');
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
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT bookISBN, bookTitle, bookAuthor, bookDescription, bookPublisher, bookGenre, bookFormat, bookSection FROM book";
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['bookTitle'] . "<br>" . "by " . $row['bookAuthor'] . "<br> <br>" . $row['bookDescription'] . "<br> <br>" . "ISBN: " . $row                                               ['bookISBN'] . "<br>" . "Publisher: " . $row['bookPublisher'] . "<br>" . "Genre: " . $row['bookGenre'] . "<br>" . "Format: " . $row['bookFormat'] .                                         "<br>" . "Section: " . $row['bookSection'] . "<br>" . "</td>";
                                        echo 
                                        "<td style='text-align: center'>" . "<a href='https://www.cosc3380team16.online/pages/loginPage/login.php'><input type='submit' value='Login' style='margin: 0 auto; width: 75%; background-color: lightgray; border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'></input></a>" .
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