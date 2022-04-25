<?php
    /*
        Date Created: 2022_04_18 by Nathan Brueckner
            Description: Edit books function.
            Source: 
            https://www.php.net/manual/en/control-structures.foreach.php for foreach loop to display selected option by default.
    */

    session_start();

    if(!isset($_SESSION['admin']))
    {
        header('Location: ../../adminPortal.php');
    }

    $bookIDVar = $_POST['bookID'];
    $bookISBNVar = $_POST['bookISBN'];
    $bookAuthorVar = $_POST['bookAuthor'];
    $bookTitleVar = $_POST['bookTitle'];
    $bookGenreVar = $_POST['bookGenre'];
    $bookDescriptionVar = $_POST['bookDescription'];
    $bookPublisherVar = $_POST['bookPublisher'];
    $bookFormatVar = $_POST['bookFormat'];
    $bookSectionVar = $_POST['bookSection'];

    echo $bookIDVar;

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
          <form action="editBookAction.php" method = "POST">
            <input type="hidden" name="bookID" value=<?php echo $bookIDVar; ?>>
            <div class="data">
              <table align="center">
                <tr>
                  <td><label for="bookFormat">Item Format:</label></td>
                  <td>
                    <select id="bookFormat" name="bookFormat">
                        <option value=""></option>

                        <?php
                            $optionArray = [
                                "Book",
                                "Newspaper",
                                "CD",
                                "DVD"
                            ];

                            foreach($optionArray as $data)
                            {
                                if($data == $bookFormatVar)
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
                    <label for="booktitle">Title:</label>
                  </td>
                  <td>
                    <input type="text" id="bookTitle" name="bookTitle" value=<?php echo '"' . $bookTitleVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookAuthor">Author Name:</label>
                  </td>
                  <td>
                    <input type="text" id="bookAuthor" name="bookAuthor" value=<?php echo '"' . $bookAuthorVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookISBN">ISBN:</label>
                  </td>
                  <td>
                    <input type="text" id="bookISBN" value=<?php echo '"' . $bookISBNVar . '"' ?> name="bookISBN" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookPublisher">Publisher Name:</label>
                  </td>
                  <td>
                    <input type="text" id="bookPublisher" value=<?php echo '"' . $bookPublisherVar . '"' ?> name="bookPublisher" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookGenre">Genre:</label>
                  </td>
                  <td>
                    <input type="text" id="bookGenre" name="bookGenre" value=<?php echo '"' . $bookGenreVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookSection">Location:</label>
                  </td>
                  <td>
                    <input type="text" id="bookSection" name="bookSection" value=<?php echo '"' . $bookSectionVar . '"' ?> required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="bookDescription">Book Description:</label>
                  </td>
                  <td>
                    <input type="text" id="bookDescription" name="bookDescription" value=<?php echo '"' . $bookDescriptionVar . '"' ?> required>
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