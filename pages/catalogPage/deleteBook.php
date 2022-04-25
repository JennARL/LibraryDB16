<?php
    /*
        Date Created: 2022_04_18 by Nathan Brueckner
        Date Modified: 2022_04_24 by Nathan Brueckner
          Description: Passed hidden variables to deleteBooKAction.php
            Description: Delete books function.
    */

    session_start();

    if(!isset($_SESSION['admin']))
    {
        header('Location: ../../adminPortal.php');
    }

    $bookIDVar = $_POST['bookID'];
    $bookISBNVar = $_POST['bookISBN'];
    $bookTitleVar = $_POST['bookTitle'];
    $bookAuthorVar = $_POST['bookAuthor'];
    $bookDescriptionVar = $_POST['bookDescription'];
    $bookPublisherVar = $_POST['bookPublisher'];
    $bookGenreVar = $_POST['bookGenre'];
    $bookFormatVar = $_POST['bookFormat'];

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
          <form action="deleteBookAction.php" method = "POST">
            <?php
              echo 
              "<input type='hidden' name='bookID' value=\"";echo $bookIDVar; echo"\"> 
              <input type='hidden' name='bookISBN' value=\"";echo $bookISBNVar; echo"\">
              <input type='hidden' name='bookTitle' value=\"";echo $bookTitleVar; echo"\">  
              <input type='hidden' name='bookAuthor' value=\"";echo $bookAuthorVar; echo"\"> 
              <input type='hidden' name='bookDescription' value=\"";echo $bookDescriptionVar; echo"\"> 
              <input type='hidden' name='bookPublisher' value=\"";echo $bookPublisherVar; echo"\"> 
              <input type='hidden' name='bookGenre' value=\"";echo $bookGenreVar; echo"\"> 
              <input type='hidden' name='bookFormat' value=\"";echo $bookFormatVar; echo"\">"
            ?>
            <div class="data">
            
            <label>ARE YOU SURE YOU WANT TO DELETE?</label>
            <br>
              <table align="center">
                    
                <tr>
                  <td>
                    <label for="bookTitle">Title:</label>
                  </td>
                  <td>
                    <div><?php echo '"' . $bookTitleVar . '"' ?></div>
                  </td>
                </tr>
                <tr>
                  <td><label for="reasonDeleted">Reason Deleted:</label></td>
                  <td>
                    <select id="reasonDeleted" name="reasonDeleted">
                        <option value=""></option>
                        <option value="Destroyed">Destroyed</option>
                        <option value="Lossed">Lost</option>
                        <option value="Transferred">Transferred</option>
                    </select>
                  </td> 
                </tr>

                <br>

              </table>
            </div>

            <div style="display:flex">
                <input type="submit">
            <div>

          </form>
        </div>
      </main>
      <footer>
        <p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
      </footer>
    </body>
</html>