<?php
    /*
        Date Created: 2022_04_19 by Nathan Brueckner
        Purpose of File:
            Process the edit user logic for editing users.
    */

    session_start();
    require_once('../../dbConn/dbConn.php');

    $userIDVar = $_POST['userID'];
    $userUsernameVar = $_POST['userUsername'];
    $userPasswordVar = $_POST['userPassword'];
    $userFirstNameVar = $_POST['userFirstName'];
    $userLastNameVar = $_POST['userLastName'];
    $userTypeVar = $_POST['userType'];
    $userBirthDateVar = $_POST['userBirthDate'];
    $userAddressLine1Var = $_POST['userAddressLine1'];
    $userAddressLine2Var = $_POST['userAddressLine2'];
    $userCityVar = $_POST['userCity'];
    $userStateVar = $_POST['userState'];
    $userZIPVar = $_POST['userZIP'];

    $data = [
        'userIDVar' => $userIDVar,
        'userUsernameVar' => $userUsernameVar,
        'userPasswordVar' => $userPasswordVar,
        'userFirstNameVar' => $userFirstNameVar,
        'userLastNameVar' => $userLastNameVar,
        'userTypeVar' => $userTypeVar,
        'userBirthDateVar' => $userBirthDateVar,
        'userAddressLine1Var' => $userAddressLine1Var,
        'userAddressLine2Var' => $userAddressLine2Var,
        'userCityVar' => $userCityVar,
        'userStateVar' => $userStateVar,
        'userZIPVar' => $userZIPVar,
    ];

    $sql = "UPDATE user SET userUsername=:userUsernameVar, userPassword=:userPasswordVar, userFirstName=:userFirstNameVar, userLastName=:userLastNameVar, userType=:userTypeVar, userBirthDate=:userBirthDateVar, userAddressLine1=:userAddressLine1Var, userAddressLine2=:userAddressLine2Var, userCity=:userCityVar, userState=:userStateVar, userZIP=:userZIPVar WHERE userID=:userIDVar";

   $stmt = $connection->prepare($sql);
   $stmt->execute($data);

    header('Location: userListAdmin.php');
?>