<?php
    /*
        Date Created: 2022_04_23 by Nathan Brueckner
        Date Modified: 2022_04_24 by Nathan Brueckner
            Modification Description: Added Insert commands for the transaction log.

        Purpose of File:
            Checkout book
    */


    session_start();
    require_once('../../dbConn/dbConn.php');

    

    //header('Location: libraryCatalogUser.php');
?>

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
                    require "../header.php";
                ?>
            </nav>
      </header>
        
      <main>
        <div class="container">
            <div class="data">
              <table style="align=center;width: 60vh">
                <tbody style="text-align: center;">
                    <?php
                        $bookIDVar = $_POST['bookID'];
                        $bookTitleVar = $_POST['bookTitle'];
                        $userIDVar = $_SESSION['userID'];
                        $checkOutDateVar = date('Y-m-d');
                        $transactionTypeVar = "out";

                        echo "<tr>" . "<td>" . "Book ID" . "</td>" . "<td>" . $bookIDVar . "</td>" . "</tr>"; 
                        echo "<br>";
                        echo "<tr>" . "<td>" . "Book Title" . "</td>" . "<td>" . $bookTitleVar . "</td>" . "</tr>"; 
                        echo "<br>";
                        echo "<tr>" . "<td>" . "User ID" . "</td>" . "<td>" . $userIDVar . "</td>" . "</tr>";
                        echo "<br>";
                        echo "<tr>" . "<td>" . "Check Out Date" . "</td>" . "<td>" . $checkOutDateVar . "</td>" . "</tr>";

                        $data = [
                            'bookIDVar' => $bookIDVar,
                            'userIDVar' => $userIDVar,
                            'checkOutDateVar' => $checkOutDateVar,
                        ];

                        $data2 = [
                            'bookIDVar' => $bookIDVar,
                            'userIDVar' => $userIDVar,
                            'checkOutDateVar' => $checkOutDateVar,
                            'transactionTypeVar' => $transactionTypeVar,
                        ];

                        $sql = "UPDATE book SET userID=:userIDVar, checkOutDate=:checkOutDateVar WHERE bookID=:bookIDVar";
                        $sql2 = "INSERT INTO bookTransaction (bookID, userID, date, transactionType) VALUES (:bookIDVar, :userIDVar, :checkOutDateVar, :transactionTypeVar)";

                        $stmt = $connection->prepare($sql);
                        $stmt->execute($data);
                        $stmt2 = $connection->prepare($sql2);
                        $stmt2->execute($data2);

                    ?>
                </tbody>
              </table>

                <div style="display:flex;">
                    <input type="submit" id = "OK" onclick="location.href='libraryCatalogUser.php'" value="Back" style="margin: 0 auto; width: 75%; background-color: lightgray; border-radius: 25px; border: 2px solid medium; padding: 5px; font-family: Geneva;">
                </div>

            </div>

        </div>
      </main>
      <footer>
        <p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
      </footer>
    </body>
</html>
