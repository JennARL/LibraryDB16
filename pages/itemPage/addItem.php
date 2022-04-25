<?php
    /*
        Date Created: 2022_04_10 by Jenn Landicho
        Date Modified 2022_04_12 by Jenn Landicho
                Modification Details: Reformatted the tables, added styling to the page.
        Modified: 2022_04_15 by Nathan Brueckner
            Description: Changed header to be adminHeader.php. Modified form to allow it to send to addItemAction.php. Added more fields to the form
          Modified: 2022_04_24 by Nathan Brueckner
            Description: Changed item tags (ids and names)
          Description: Adding books function.
    */

    session_start();

    if(!isset($_SESSION['admin']))
    {
        header('Location: ../../adminPortal.php');
    }
    //print_r($_SESSION['admin']);

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
        <form id="additem" action="addItemAction.php" method = "POST">
            <div class="data">
              <table align="center">
                <br>
                <tr>
                  <td>
                    <label for="itemType">Item Name:</label>
                  </td>
                  <td>
                    <input type="text" id="itemName" name="itemName" placeholder="Marker, Projector..." required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="location">Section:</label>
                  </td>
                  <td>
                    <input type="text" id="itemSection" name="itemSection" placeholder="Section Number" required>
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