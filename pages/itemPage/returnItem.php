<?php
    /*
        Date Created: 2022_04_23 by Nathan Brueckner

        Purpose of File:
            Return Item
    */

    session_start();
    require_once('../../dbConn/dbConn.php');


    $itemIDVar = $_POST['itemID'];
    $userIDVar = 0;
    $returnDateVar = date('Y-m-d');

    $data = [
        'itemIDVar' => $itemIDVar,
        'userIDVar' => $userIDVar,
        'returnDateVar' => $returnDateVar,
    ];

    $sql = "UPDATE item SET userID=:userIDVar, returnDate=:returnDateVar WHERE itemID=:itemIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: requestItemUser.php');
?>