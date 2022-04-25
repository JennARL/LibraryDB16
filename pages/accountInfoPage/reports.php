<?php
    /*
        Date Created: 2022_04_23 by Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner
            Details: Connected to DB
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
                <h2>Book Reports</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                Author: 
                            </td>
                            <td>
                            <input type="text"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Genre: 
                            </td>
                            <td>
                            <input type="text"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Publisher: 
                            </td>
                            <td>
                            <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Format: 
                            </td>
                            <td>
                            <input type="text">
                            </td>
                        </tr>

                    <tbody>
                <table>
                
                <h2>Financial Reports</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                Type of Damage
                            </td>
                            <td>
                            <input type="text"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User
                            </td>
                            <td>
                            <input type="text"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Type of Item
                            </td>
                            <td>
                            <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Amount 
                            </td>
                            <td>
                            <input type="text">
                            </td>
                        </tr>

                    <tbody>
                <table>

                <input type="submit" value="Generate Report" style="margin: 0 auto; width: 35%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
            </div>
        </div>

    </body>
</html> 

