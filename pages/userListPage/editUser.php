<?php
    /*
        Date Created: 2022_04_19 by Nathan Brueckner
            Description: Edit users function.
            Source: 
            https://www.php.net/manual/en/control-structures.foreach.php for foreach loop to display selected option by default.
    */

    session_start();

    if(!isset($_SESSION['admin']))
    {
        header('Location: ../../adminPortal.php');
    }

    $userIDVar = $_POST['userID'];
    $userUsernameVar = $_POST['userUsername'];
    $userPasswordVar = $_POST['userPassword'];
    $userFirstNameVar = $_POST['userFirstName'];
    $userLastNameVar = $_POST['userLastName'];
    $userTypeVar = $_POST['userType'];
    $userBirthDateVar = $_POST['userBirthDate'];
    $userAddressLine1Var = $_POST['userAddressLine1'];
    $userAddressLine2Var = $_POST['userAddressLine2'];
    $userCityVar = $_POST['userCity'];
    $userStateVar = $_POST['userState'];
    $userZIPVar = $_POST['userZIP'];
    $itemLimitVar = $_POST['itemLimit'];
    $bookLimitVar = $_POST['bookLimit'];

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
          <form action="editUserAction.php" method = "POST">
            <input type="hidden" name="userID" value=<?php echo $userIDVar; ?>>
            <div class="data">
              <table align="center">
                <tr>
                  <td><label for="userType">User Type:</label></td>
                  <td>
                    <select id="userType" name="userType" required>
                        <option value=""></option>

                        <?php
                            $optionArray = [
                                "1",
                                "2"
                            ];

                            foreach($optionArray as $data)
                            {
                                if($data == $userTypeVar)
                                {
                                    echo "<option selected=" . $data . ">" . $data . "</option>";
                                }
                                else
                                {
                                    echo "<option value=" . $data . ">" . $data . "</option>";
                                }

                            }

                        ?>
                    </select>
                  </td> 
                </tr>
                <br>
                <tr>
                  <td>
                    <label for="userUsername">Username:</label>
                  </td>
                  <td>
                    <input type="text" id="userUsername" name="userUsername" value=<?php echo '"' . $userUsernameVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userPassword">Password:</label>
                  </td>
                  <td>
                    <input type="text" id="userPassword" name="userPassword" value=<?php echo '"' . $userPasswordVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userFirstName">First Name:</label>
                  </td>
                  <td>
                    <input type="text" id="userFirstName" value=<?php echo '"' . $userFirstNameVar . '"' ?> name="userFirstName" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userLastName">Last Name:</label>
                  </td>
                  <td>
                    <input type="text" id="userLastName" value=<?php echo '"' . $userLastNameVar . '"' ?> name="userLastName" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userBirthDate">Birth Date:</label>
                  </td>
                  <td>
                    <input type="text" id="userBirthDate" name="userBirthDate" value=<?php echo '"' . $userBirthDateVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userAddressLine1">Address Line 1:</label>
                  </td>
                  <td>
                    <input type="text" id="userAddressLine1" name="userAddressLine1" value=<?php echo '"' . $userAddressLine1Var . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userAddressLine2">Address Line 2:</label>
                  </td>
                  <td>
                    <input type="text" id="userAddressLine2" name="userAddressLine2" value=<?php echo '"' . $userAddressLine2Var . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userCity">City:</label>
                  </td>
                  <td>
                    <input type="text" id="userCity" name="userCity" value=<?php echo '"' . $userCityVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userState">State:</label>
                  </td>
                  <td>
                    <input type="text" id="userState" name="userState" value=<?php echo '"' . $userStateVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="userZIP">ZIP:</label>
                  </td>
                  <td>
                    <input type="text" id="userZIP" name="userZIP" value=<?php echo '"' . $userZIPVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="itemLimit">Item Limit:</label>
                  </td>
                  <td>
                    <input type="text" id="itemLimit" name="itemLimit" value=<?php echo '"' . $itemLimitVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookLimit">Book Limit:</label>
                  </td>
                  <td>
                    <input type="text" id="bookLimit" name="bookLimit" value=<?php echo '"' . $bookLimitVar . '"' ?> required>
                  </td>
                </tr>
                <br>
                <tr>
                  <td>
                    <input type="submit">
                  </td>
                </tr>
              </table>
            </div>

          </form>
        </div>
      </main>
      <footer>
        <p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
      </footer>
    </body>
</html>