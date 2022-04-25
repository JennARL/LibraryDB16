<?php
    /*
        Date Created: 2022_04_17 by Jenn Landicho
        Date Modified: 2022_04_19 by Nathan Brueckner
            Details: Fixed problems with the table displaying.
	    Purpose of file:
		    Display users in library for admins, plus admin controls.
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
            header('Location: userPortal.php');
        }
        else
        {
            header('Location: index.php');
        }
	}

    require_once('../../dbConn/dbConn2.php');

?>

	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/userList.css">
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
                
                <!--<div>
                    <input type="submit" id = "addUser" onclick="location.href='addUser.php'" value="Add User">
                </div>-->
                
                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                <br>
                
                <div class="displaysearch">
                    <table class="searchtable" id="searchtable" style="color:black;">
                        <thead>
                            <tr>
                                <th>Library User</th>
                                <th>Fines</th>
                                <!--<th>Books Checked Out</th>
                                <th>Items Checked Out</th>-->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT userID, userUsername, userPassword, userFirstName, userLastName, userType, userBirthDate, userAddressLine1, userAddressLine2, userCity, userState, userZIP, itemLimit, bookLimit, libraryFines FROM user";
                                $sql2 = "SELECT bookID, bookISBN, bookTitle, userID, checkOutDate, returnDate FROM book";
                                $sql3 = "SELECT itemID, itemName, userID, checkOutDate, returnDate FROM item";
                                $result = mysqli_query($connection, $sql);
                                $result2 = mysqli_query($connection, $sql2);
                                $result3 = mysqli_query($connection, $sql3);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . "User ID: " . $row['userID'] . "<br>" . "Username: " . $row['userUsername'] . "<br>" . "Name: " . $row['userFirstName'] . " " . $row['userLastName'] . "<br>" . "User Type: "; 
                                        
                                            if($row['userType'] == 1)
                                            {
                                                echo 'Admin';
                                            }
                                            else if($row['userType'] == 2)
                                            {
                                                echo 'User';
                                            }
                                         
                                        echo "<br>" . "Birth Date: " . $row['userBirthDate'] . "<br>" . "Address: " . $row['userAddressLine1'] . ", " . $row['userAddressLine2'] . ", " . $row['userCity'] . ", " . $row['userState'] . " " . $row['userZIP'] . "</td>";
                                        
                                        echo "<td>" . "Fines: $" . $row['libraryFines'] . "</td>";

                                        /*echo "<td>";
                                        if(mysqli_num_rows($result2) > 0)
                                        {
                                            
                                            while($row2 = mysqli_fetch_assoc($result2))
                                            {
                                                if($row2['userID'] == $row['userID'])
                                                {
                                                    echo "Book ISBN: " . $row2['bookISBN'] . "<br>" . "Book Title: " . $row2['bookTitle'] . "<br>" . "Check Out Date: " . $row2['checkOutDate'] . "<br> <br>";
                                                }
                                            }
                                        }
                                        echo "</td>";

                                        echo "<td>";
                                        if(mysqli_num_rows($result3) > 0)
                                        {
                                            while($row3 = mysqli_fetch_assoc($result3))
                                            {
                                                if($row3['userID'] == $row['userID'])
                                                {
                                                    echo "Item Name: " . $row2['itemName'] . "<br>" . "Check Out Date: " . $row2['checkOutDate'] . "<br> <br>";
                                                }
                                            }
                                        }
                                        echo "</td>";*/

                                        echo 
                                        "<td style='text-align: center'>" . "<form action='editUser.php' method = 'POST'>
                                        <input type='hidden' name='userID' value=\"";echo $row['userID']; echo"\"> 
                                        <input type='hidden' name='userUsername' value=\"";echo $row['userUsername']; echo"\">
                                        <input type='hidden' name='userPassword' value=\"";echo $row['userPassword']; echo"\">  
                                        <input type='hidden' name='userFirstName' value=\"";echo $row['userFirstName']; echo"\"> 
                                        <input type='hidden' name='userLastName' value=\"";echo $row['userLastName']; echo"\"> 
                                        <input type='hidden' name='userType' value=\"";echo $row['userType']; echo"\"> 
                                        <input type='hidden' name='userBirthDate' value=\"";echo $row['userBirthDate']; echo"\"> 
                                        <input type='hidden' name='userAddressLine1' value=\"";echo $row['userAddressLine1']; echo"\"> 
                                        <input type='hidden' name='userAddressLine2' value=\"";echo $row['userAddressLine2']; echo"\">
                                        <input type='hidden' name='userCity' value=\"";echo $row['userCity']; echo"\">
                                        <input type='hidden' name='userState' value=\"";echo $row['userState']; echo"\">
                                        <input type='hidden' name='userZIP' value=\"";echo $row['userZIP']; echo"\">
                                        <input type='hidden' name='itemLimit' value=\"";echo $row['itemLimit']; echo"\">
                                        <input type='hidden' name='bookLimit' value=\"";echo $row['bookLimit']; echo"\">

                                        

                                        <input type=submit value='Edit' style='margin: 0 auto; width: 75%; background-color:lightgrey;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form> <br>";
                                        
                                        echo 
                                        "<form action='payFinesAdmin.php' method = 'POST'>
                                        <input type='hidden' name='userID' value=\"";echo $row['userID']; echo"\"> 
                                        <input type='hidden' name='libraryFines' value=\"";echo $row['libraryFines']; echo"\">

                                            <input type=submit value='Pay Fines' style='margin: 0 auto; width: 75%; background-color:lightgrey; margin-bottom: 5px;                                                    border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'> </form>" .
                                            "<br>" .

                                        "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                </div>
                </table>
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