<?php
    /*
        Date Created: 2022_04_15 by Nathan Brueckner

        Purpose of File:
            Process the edit book logic for editing books.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $bookISBNVar = $_POST['bookISBN'];
    $bookAuthorVar = $_POST['bookauthor'];
    $bookTitleVar = $_POST['booktitle'];
    $bookGenreVar = $_POST['bookgenre'];
    $bookDescriptionVar = $_POST['bookdescription'];
    $bookPublisherVar = $_POST['bookpublisher'];
    $bookFormatVar = $_POST['bookformat'];
    $bookSectionVar = $_POST['booksection'];

    $data = [
        'bookISBNVar' => $bookISBNVar,
        'bookAuthorVar' => $bookAuthorVar,
        'bookTitleVar' => $bookTitleVar,
        'bookGenreVar' => $bookGenreVar,
        'bookDescriptionVar' => $bookDescriptionVar,
        'bookPublisherVar' => $bookPublisherVar,
        'bookFormatVar' => $bookFormatVar,
        'bookSectionVar' => $bookSectionVar,
    ];

    $sql = "INSERT INTO book (bookISBN, bookAuthor, bookTitle, bookGenre, bookDescription, bookPublisher, bookFormat, bookSection) VALUES (:bookISBNVar, :bookAuthorVar, :bookTitleVar, :bookGenreVar, :bookDescriptionVar, :bookPublisherVar, :bookFormatVar, :bookSectionVar)";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: addBook.php');
?>