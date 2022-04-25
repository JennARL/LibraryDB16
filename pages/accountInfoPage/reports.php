<?php
    /*
        Date Created: 2022_04_23 by Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner
            Details: Connected to DB. Changed Inputs. Added function to inputs. Made form.
        Purpose:
            Page to request reports
        Sources:
            https://www.w3schools.com/php/func_date_date_add.asp#:~:text=%24date%3Ddate_create(%222013,(%24date%2C%22Y%2Dm%2Dd%22)%3B
                Adding dates.
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

                <form id="bookReport" action="bookReport.php" method = "POST">
                    <h2>Book Reports</h2>
                    <table align="center">
                        <tr>
                            <td>
                                <label for="bookFormat">Format:</label>
                            </td>
                            <td>
                                <select id="bookFormat" name="bookFormat">
                                    <option value=""></option>
                                    <option value="Book">Book</option>
                                    <option value="Newspaper">Newspaper</option>
                                    <option value="CD">CD</option>
                                    <option value="DVD">DVD</option>
                                </select>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <label for="bookAuthor">Name:</label>
                            </td>
                            <td>
                                <input type="text" id="bookAuthor" name="bookAuthor" placeholder="First name OR last name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="bookGenre">Genre:</label>
                            </td>
                            <td>
                                <input type="text" id="bookGenre" name="bookGenre" placeholder="Genre">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="bookPublisher">Publisher:</label>
                            </td>
                            <td>
                                <input type="text" id="bookPublisher" name="bookPublisher" placeholder="Publisher">
                            </td>
                        </tr>
                    </table>
                    <div style="display:flex;">
                        <input type="submit" value="Generate Book Report" style="margin: 0 auto; width: 35%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
                    </div>
                </form>


                <form id="userReport" action="userReport.php" method = "POST">
                    <h2>User Reports</h2>
                    <table align="center">
                        <tr>
                            <td>
                                <label for="userUsername">Username:</label>
                            </td>
                            <td>
                                <input type="text" id="userUsername" name="userUsername" placeholder="Username">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userFirstName">First Name:</label>
                            </td>
                            <td>
                                <input type="text" id="userFirstName" name="userFirstName" placeholder="First name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userLastName">Last Name:</label>
                            </td>
                            <td>
                                <input type="text" id="userLastName" name="userLastName" placeholder="Last name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userBirthDate">Birth Date:</label>
                            </td>
                            <td>
                                <input type="date" id="userBirthDate" name="userBirthDate">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userCity">City:</label>
                            </td>
                            <td>
                                <input type="text" id="userCity" name="userCity" placeholder="City">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userState">State:</label>
                            </td>
                            <td>
                                <input type="text" id="userState" name="userState" placeholder="State">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userZIP">ZIP:</label>
                            </td>
                            <td>
                                <input type="text" id="userZIP" name="userZIP" placeholder="ZIP">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="itemsCheckedOut"># of Items Checked Out:</label>
                            </td>
                            <td>
                                <input type="text" id="itemsCheckedOut" name="itemsCheckedOut" placeholder="# of Items Checked Out">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="booksCheckedOut"># of Books Checked Out:</label>
                            </td>
                            <td>
                                <input type="text" id="booksCheckedOut" name="booksCheckedOut" placeholder="# of Books Checked Out">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="libraryFines">Fines $:</label>
                            </td>
                            <td>
                                <input type="text" id="libraryFines" name="libraryFines" placeholder="$Fines">
                            </td>
                        </tr>


                        
                    </table>
                    <div style="display:flex;">
                        <input type="submit" value="Generate User Report" style="margin: 0 auto; width: 35%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
                    </div>
                </form>

                <form id="fineReport" action="fineReport.php" method = "POST">
                    <h2>Show Total Fines (Entire Library Added)</h2>
                    <div style="display:flex;">
                        <input type="submit" value="Generate Fine Report" style="margin: 0 auto; width: 35%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
                    </div>
                </form>

                <form id="transactionReport" action="transactionReport.php" method = "POST">
                    <h2>Transaction Reports</h2>
                    <table align="center">
                        <tr>
                            <td>
                                <label for="bookID">Book ID:</label>
                            </td>
                            <td>
                                <input type="text" id="bookID" name="bookID" placeholder="book ID">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userID">User ID:</label>
                            </td>
                            <td>
                                <input type="text" id="userID" name="userID" placeholder="user ID">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date">Date:</label>
                            </td>
                            <td>
                                <input type="date" id="date" name="date">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="transactionType">Transaction Type:</label>
                            </td>
                            <td>
                                <select id="transactionType" name="transactionType">
                                    <option value=""></option>
                                    <option value="in">In</option>
                                    <option value="out">Out</option>
                                </select>
                            </td> 
                        </tr>
                        
                    </table>
                    <div style="display:flex;">
                        <input type="submit" value="Generate Transaction Report" style="margin: 0 auto; width: 35%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
                    </div>
                </form>

            </div>
        </div>

    </body>
</html> 

