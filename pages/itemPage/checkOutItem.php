<?php
    /*
        Date Created: 2022_04_23 by Nathan Brueckner

        Purpose of File:
            Checkout item
    */

    session_start();
    require_once('../../dbConn/dbConn.php');


    $itemIDVar = $_POST['itemID'];
    $userIDVar = $_SESSION['userID'];
    $checkOutDateVar = date('Y-m-d');

    $data = [
        'itemIDVar' => $itemIDVar,
        'userIDVar' => $userIDVar,
        'checkOutDateVar' => $checkOutDateVar,
    ];

    $sql = "UPDATE item SET userID=:userIDVar, checkOutDate=:checkOutDateVar WHERE itemID=:itemIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: requestItemUser.php');
?>