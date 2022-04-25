<?php
    /*
        Date Created: 2022_04_19 by Nathan Brueckner
        Purpose: Adding users function.
    */
    session_start();

    if(!isset($_SESSION['admin']))
    {
        header('Location: ../../adminPortal.php');
    }
    else if(!isset($_SESSION['user']))
    {
        header('Location: ../../userPortal.php');
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
          <form id="addUser" action="addUserAction.php" method = "POST">
            <div class="data">
              <table align="center">
                <tr>
                  <td><label for="userType">User Type:</label></td>
                  <td>
                    <select id="userType" name="userType" required>
                        <option value=""></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                  </td> 
                </tr>
                <br>
                  <td>
                    <label for="userUsername">Username:</label>
                  </td>
                  <td>
                    <input type="text" id="userUsername" name="userUsername" placeholder="Username" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userPassword">Password:</label>
                  </td>
                  <td>
                    <input type="text" id="userPassword" placeholder="Password" name="userPassword" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userFirstName">Phone Number:</label>
                  </td>
                  <td>
                    <input type="text" id="userFirstName" name="userFirstName" placeholder="First Name" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userLastName">Last Name:</label>
                  </td>
                  <td>
                    <input type="text" id="userLastName" name="userLastName" placeholder="Last Name" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userBirthDate">Birth Date:</label>
                  </td>
                  <td>
                    <input type="date" id="userBirthDate" name="userBirthDate" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userAddressLine1">Address Line 1:</label>
                  </td>
                  <td>
                    <input type="text" id="userAddressLine1" name="userAddressLine1" placeholder="Address Line 1" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userAddressLine2">Address Line 2:</label>
                  </td>
                  <td>
                    <input type="text" id="userAddressLine2" name="userAddressLine2" placeholder="Address Line 2" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userCity">City:</label>
                  </td>
                  <td>
                    <input type="text" id="userCity" name="userCity" placeholder="City" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userState">State:</label>
                  </td>
                  <td>
                    <input type="text" id="userState" name="userState" placeholder="State" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userZIP">ZIP:</label>
                  </td>
                  <td>
                    <input type="text" id="userZIP" name="userZIP" placeholder="ZIP" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="itemLimit">Item Limit:</label>
                  </td>
                  <td>
                    <input type="text" id="itemLimit" name="itemLimit" placeholder="5" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookLimit">Book Limit:</label>
                  </td>
                  <td>
                    <input type="text" id="bookLimit" name="bookLimit" placeholder="Book Limit" required>
                  </td>
                </tr>
                <br>
              </table>
            </div>

            <div style="display:flex;">
                <input type="submit" id = "back" onclick="location.href='userListAdmin.php'" value="Back">
                <input id="submitchange" type="submit">
            </div>

          </form>
        </div>
      </main>
      <footer>
        <p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
      </footer>
    </body>
</html>