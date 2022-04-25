<?php
    /*
        Date Created: 2022_04_07 by Nathan Brueckner
        Date Modified 2022_04_07 by Nathan Brueckner
                Modification Description: Changed file type from JS to PHP and took out PHP markings. PHP is better for this task.
        Date Modified: 2022_04_23 by Nathan Brueckner
                Modification Description: Removed library events page
        Purpose:
            Centralize edits of header instead of having it in several different places, having to edit it with every change. In this case, for the user userType.
        Source:
            https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file I used a solution on this posting to learn how to write this as a JS script. - Nathan Brueckner
    */
?>

    <ul>
        <li class = "navli"> <a href = "../loginPage/logout.php"> Logout </a></li>
        <!--<li class = "navli"> <a href = "../eventPage/libraryEventsUser.php"> Library Events </a></li>-->
        <li class = "navli"> <a href = "../studyRoomPage/requestStudyRoomUser.php"> Request Study Room </a></li>
        <li class = "navli"> <a href = "../itemPage/requestItemUser.php"> Request Item </a></li>
        <li class = "navli"> <a href = "../catalogPage/libraryCatalogUser.php"> Library Catalog </a></li>
        <li class = "navli"> <a href = "../accountInfoPage/userInfo.php"> Account </a></li>
        <li class = "navli"> <a href = "../../userPortal.php"> Home </a></li>
    </ul>
