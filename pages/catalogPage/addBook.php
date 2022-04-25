<?php
    /*
        Date Created: 2022_04_10 by Jenn Landicho
        Date Modified 2022_04_12 by Jenn Landicho
                Modification Details: Reformatted the tables, added styling to the page.
        Modified: 2022_04_15 by Nathan Brueckner
            Description: Changed header to be adminHeader.php. Modified form to allow it to send to addBookAction.php. Added more fields to the form
            Modification Description: Adding books function.
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
          <form id="addbook" action="addBookAction.php" method = "POST">
            <div class="data">
              <table align="center">
                <tr>
                  <td><label for="bookformat">Item Format:</label></td>
                  <td>
                    <select id="bookformat" name="bookformat">
                        <option value=""></option>
                        <option value="Book">Book</option>
                        <option value="Newspaper">Newspaper</option>
                        <option value="CD">CD</option>
                        <option value="DVD">DVD</option>
                    </select>
                  </td> 
                </tr>
                <br>
                <tr>
                  <td>
                    <label for="booktitle">Title:</label>
                  </td>
                  <td>
                    <input type="text" id="booktitle" name="booktitle" placeholder="Book Title" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookAuthor">Author Name:</label>
                  </td>
                  <td>
                    <input type="text" id="bookAuthor" name="bookauthor" placeholder="Last name, First name" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookISBN">ISBN:</label>
                  </td>
                  <td>
                    <input type="text" id="bookISBN" placeholder="ISBN Number" name="bookISBN" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookPublisher">Publisher Name:</label>
                  </td>
                  <td>
                    <input type="text" id="bookPublisher" name="bookpublisher" placeholder="Publisher..." required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookGenre">Genre:</label>
                  </td>
                  <td>
                    <input type="text" id="bookGenre" name="bookgenre" placeholder="Genre..." required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookSection">Location:</label>
                  </td>
                  <td>
                    <input type="text" id="bookSection" name="booksection" placeholder="Location..." required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookDescription">Book Description:</label>
                  </td>
                  <td>
                    <input type="text" id="bookDescription" name="bookdescription" placeholder="Book Description" required>
                  </td>
                </tr>
                <br>
                
              </table>

                <div style="display:flex;">
                    <input type="submit" id = "back" onclick="location.href='libraryCatalogAdmin.php'" value="Back">
                    <input id="submitchange" type="submit">
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