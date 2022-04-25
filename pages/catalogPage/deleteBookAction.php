<?php
    /*
        Date Created: 2022_04_24 by Nathan Brueckner
        

        Purpose of File:
            Process the delete book logic. It moves it from book table to deletedbook table
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $bookIDVar = $_POST['bookID'];
    $bookISBNVar = $_POST['bookISBN'];
    $bookAuthorVar = $_POST['bookAuthor'];
    $bookTitleVar = $_POST['bookTitle'];
    $bookGenreVar = $_POST['bookGenre'];
    $bookDescriptionVar = $_POST['bookDescription'];
    $bookPublisherVar = $_POST['bookPublisher'];
    $bookFormatVar = $_POST['bookFormat'];
    $bookSectionVar = $_POST['bookSection'];
    $reasonDeletedVar = $_POST['reasonDeleted'];
    $dateDeletedVar = date('Y-m-d');

    $data = [
        'bookISBNVar' => $bookISBNVar,
        'bookAuthorVar' => $bookAuthorVar,
        'bookTitleVar' => $bookTitleVar,
        'bookGenreVar' => $bookGenreVar,
        'bookDescriptionVar' => $bookDescriptionVar,
        'bookPublisherVar' => $bookPublisherVar,
        'bookFormatVar' => $bookFormatVar,
        'reasonDeletedVar' => $reasonDeletedVar,
        'dateDeletedVar' => $dateDeletedVar,
    ];

    $sql = "INSERT INTO deletedbook (bookISBN, bookAuthor, bookTitle, bookGenre, bookDescription, bookPublisher, bookFormat, reasonDeleted, dateDeleted) VALUES (:bookISBNVar, :bookAuthorVar, :bookTitleVar, :bookGenreVar, :bookDescriptionVar, :bookPublisherVar, :bookFormatVar, :reasonDeletedVar, :dateDeletedVar)";
    $sql2 = "DELETE FROM book WHERE bookID=$bookIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);
   $stmt2 = $connection->prepare($sql2);
   $stmt2->execute();

    header('Location: libraryCatalogAdmin.php');
?>