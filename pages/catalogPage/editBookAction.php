<?php
    /*
        Date Created: 2022_04_18 by Nathan Brueckner
        Purpose of File:
            Process the edit book logic for editing books.
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

    $data = [
        'bookIDVar' => $bookIDVar,
        'bookISBNVar' => $bookISBNVar,
        'bookAuthorVar' => $bookAuthorVar,
        'bookTitleVar' => $bookTitleVar,
        'bookGenreVar' => $bookGenreVar,
        'bookDescriptionVar' => $bookDescriptionVar,
        'bookPublisherVar' => $bookPublisherVar,
        'bookFormatVar' => $bookFormatVar,
        'bookSectionVar' => $bookSectionVar,
    ];

    $sql = "UPDATE book SET bookISBN=:bookISBNVar, bookAuthor=:bookAuthorVar, bookTitle=:bookTitleVar, bookGenre=:bookGenreVar, bookDescription=:bookDescriptionVar, bookPublisher=:bookPublisherVar, bookFormat=:bookFormatVar, bookSection=:bookSectionVar WHERE bookID=:bookIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: libraryCatalogAdmin.php');
?>