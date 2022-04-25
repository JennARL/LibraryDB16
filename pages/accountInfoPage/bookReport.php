<?php
    /*
        Date Created: 2022_04_24 by Nathan Brueckner
	    Purpose of file:
		    Display book report based on your specified parameters
    */
	session_start();
    
	if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: userInfo.php');
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
            require "sidenavAdmin.php"
          ?>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            <div id="profileinfo" style="height: 40%;">

                <div>
                    <input type = "text" id = "myInput" onkeyup = "searchFunction()" placeHolder = "Search">
                </div>

                    <h2>Book Reports</h2>
                    <table align="center" id="searchtable" class="searchtable" style="color:black">
                        <thead>
                            <tr>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                                function generateReport($post)
                                {
                                    $main = array();
                                    $keys = array_keys($post);
                                    $vals = array_values($post);
                                    for ($i=0, $j=count($post) ; $i<$j ; $i++)
                                    {
                                        $main[] = $keys[$i]." LIKE '%".$vals[$i]."%'";
                                    }
                                    return "SELECT bookID, bookISBN, bookAuthor, bookTitle, bookGenre, bookDescription, bookPublisher, bookFormat, bookSection, userID FROM book WHERE ".implode(' AND ',$main);
                                }


                                $sql = generateReport($_POST);
                                $result = mysqli_query($connection, $sql);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . "Book ID: " . $row['bookID'] . "<br>" . "Book ISBN: " . $row['bookISBN'] . "<br>" . "Author: " . $row['bookAuthor'] . "<br>" . "Book Title: " . $row['bookTitle'] . "<br>" . "Book Genre: " . $row['bookGenre'] . "<br>" . "Book Description: " . $row['bookDescription'] . "<br>" . "Publisher: " . $row['bookPublisher'] . "<br>" . "Format: " . $row['bookFormat'] . "<br>" . "Section: " . $row['bookSection'] . "<br>";
                                        if($row['userID'] == 0)
                                        {
                                            echo "Currently Checked Out By User ID: N/A";
                                        }
                                        else
                                        {
                                            echo "Currently Checked Out By User ID: " . $row['userID'];
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else
                                {
                                    echo "NO RESULTS";
                                }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>

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