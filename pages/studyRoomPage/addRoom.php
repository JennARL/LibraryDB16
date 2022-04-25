<?php
    /*
        Date Created: 2022_04_18 by Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner
          Modification Description: Connected to DB and addRoomAction.php
    */

    session_start();

    if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: requestStudyRoomUser.php');
        }
        else
        {
            header('Location: requestStudyRoom.php');
        }
	}


?>

<!DOCTYPE html>
<html style="width: 100vw;">
    <head>
        <meta charset="utf-8">
        <title>Texas Cougarways</title>
        <link rel="stylesheet" href="../../styling/widget.css">
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
        <div class="container">
          <form id="addRoom" action="addRoomAction.php" method = "POST">
            <div class="data">
              <table align="center">
                <tr>
                  <td>
                    <label for="Capacity">Room Capacity:</label>
                  </td>
                  <td>
                    <input type="text" id="roomCapacity" name="roomCapacity" placeholder="2, 4, 6, 8..." required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="Accomodations">Room Accomodations:</label>
                  </td>
                  <td>
                    <input type="text" id="roomAccomodations" name="roomAccomodations" placeholder="Whiteboard, Projector..." required>
                  </td>
                </tr>
                <br>
              </table>
              <div style="display:flex;">
                    <input type="submit">
                </div>
            </div>

          </form>
        </div>
      </main>
      <footer>
        <p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
      </footer>
    </body>
</html>