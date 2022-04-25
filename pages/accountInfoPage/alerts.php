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
            require "sidenav.php"
          ?>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
            <div id="profileinfo">
                <h2> Alerts</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                ex: Alert: Overdue books: payment of $0.5 for every day book is not returned.
                                
                            </td>
                            <td>
                                <input type=submit value='Dismiss' style='margin: 0 auto; width: 75%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ex: Alert: You have checked out a book, Expected return date: 04/28/22
                                
                            </td>
                            <td>
                                <input type=submit value='Dismiss' style='margin: 0 auto; width: 75%; background-color:rbg(190, -0, 42); border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;'>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>

    </body>
</html> 

