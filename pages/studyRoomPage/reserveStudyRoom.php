<?php
    /*
        Date Created: 2022_04_23 by Nathan Brueckner

        Purpose of File:
            Process reserving a room.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');


    $roomIDVar = $_POST['roomID'];
    $roomAvailableVar = $_SESSION['userID'];

    $data = [
        'roomIDVar' => $roomIDVar,
        'roomAvailableVar' => $roomAvailableVar,
    ];

    $sql = "UPDATE studyRoom SET roomAvailable=:roomAvailableVar WHERE roomID=:roomIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: requestStudyRoomUser.php');
?>