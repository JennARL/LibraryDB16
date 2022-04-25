<?php
    /*
        Date Created: 2022_04_23 by Nathan Brueckner
        Purpose of File:
            Process closing fines.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $userIDVar = $_POST['userID'];
    $libraryFinesVar = 0;

    $data = [
        'userIDVar' => $userIDVar,
        'libraryFinesVar' => $libraryFinesVar,
    ];



    $sql = "UPDATE user SET libraryFines=:libraryFinesVar WHERE userID=:userIDVar";

    $stmt = $connection->prepare($sql);
    $stmt->execute($data);

    header('Location: fines.php');

?>