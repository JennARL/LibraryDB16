<?php
    /*
        Created 2022_04_19 by: Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner

        Purpose of File:
            Process the edit item logic for editing items.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $itemNameVar = $_POST['itemName'];
    $itemSectionVar = $_POST['itemSection'];

    $data = [
        'itemNameVar' => $itemNameVar,
        'itemSectionVar' => $itemSectionVar,
    ];

    $sql = "INSERT INTO item (itemName, itemSection) VALUES (:itemNameVar, :itemSectionVar)";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: requestItemAdmin.php');
?>