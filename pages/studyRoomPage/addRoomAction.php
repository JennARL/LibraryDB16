<?php
    /*
        Date Created: 2022_04_18 by Jenn Landicho
    */
?>
<?php
    /*
        Date Created: 2022_04_18 by Jenn Landicho
        Date Modified: 2022_04_24 by Nathan Brueckner
            Modification Description: Sending data to DB

        Purpose of File:
            Process the adding room logic.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $roomCapacityVar = $_POST['roomCapacity'];
    $roomAccomodationsVar = $_POST['roomAccomodations'];

    $data = [
        'roomCapacityVar' => $roomCapacityVar,
        'roomAccomodationsVar' => $roomAccomodationsVar,
    ];

    $sql = "INSERT INTO studyroom (roomCapacity, roomAccommodations) VALUES (:roomCapacityVar, :roomAccomodationsVar)";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: requestStudyRoomAdmin.php');
?>