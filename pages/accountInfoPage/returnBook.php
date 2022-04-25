<?php
    /*
        Date Created: 2022_04_24 by Nathan Brueckner

        Purpose of File:
            Return book and update transaction log
    */

    session_start();
    require_once('../../dbConn/dbConn.php');


    $bookIDVar = $_POST['bookID'];
    $userIDVarOrig = $_SESSION['userID'];
    $userIDVar = 0;
    $returnDateVar = date('Y-m-d');
    $transactionTypeVar = "in";

    $data = [
        'bookIDVar' => $bookIDVar,
        'userIDVar' => $userIDVar,
        'returnDateVar' => $returnDateVar,
    ];

    $data2 = [
        'bookIDVar' => $bookIDVar,
        'userIDVarOrig' => $userIDVarOrig,
        'returnDateVar' => $returnDateVar,
        'transactionTypeVar' => $transactionTypeVar,
    ];

    $sql = "UPDATE book SET userID=:userIDVar, returnDate=:returnDateVar WHERE bookID=:bookIDVar";
    $sql2 = "INSERT INTO booktransaction (bookID, userID, date, transactionType) VALUES (:bookIDVar, :userIDVarOrig, :returnDateVar, :transactionTypeVar)";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);
   $stmt2 = $connection->prepare($sql2);
   $stmt2->execute($data2);

    header('Location: booksOut.php');
?>