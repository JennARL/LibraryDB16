<?php

    /*
        Date Created: 2022_04_03 by Nathan Brueckner
        Date Modified: 2022_04_07 by nathan Brueckner
            Modification Description: Moved header to userHeader.php
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Description: Moved header back to here instead of a separate file.
        Date Modified: 2022_04_19 by Jenn Landicho  
            Modification Description: Reformatting of header pages.
        Date Modified: 2022_04_23 by Nathan Brueckner
                Modification Description: Removed library events page
	    Purpose of file:
		    Home page if you are a normal user.
        Source:
            https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file used to learn how to integrate JS script into HTML file, also used to learn how to make JS script.
                Source no longer relevant because JS files were replaced with PHP files. Source left here for notation.
    */
	session_start();

	if(!isset($_SESSION['user']))
	{
        if(isset($_SESSION['admin']))
        {
            header('Location: adminPortal.php');
        }
        else
        {
            header('Location: index.php');
        }
	}


?>
	

	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="styling/homePage.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
					<ul>
                        <li class = "navli"> <a href = "pages/loginPage/logout.php"> Logout </a></li>
                        <!--<li class = "navli"> <a href = "pages/eventPage/libraryEventsUser.php"> Library Events </a></li>-->
                        <li class = "navli"> <a href = "pages/studyRoomPage/requestStudyRoomUser.php"> Request Study Room </a></li>
                        <li class = "navli"> <a href = "pages/itemPage/requestItemUser.php"> Request Item </a></li>
                        <li class = "navli"> <a href = "pages/catalogPage/libraryCatalogUser.php"> Library Catalog </a></li>
                        <li class = "navli"> <a href = "pages/accountInfoPage/userInfo.php"> Account </a></li>
                        <li class = "navli"> <a href = "userPortal.php"> Home </a></li>
                    </ul>
				</nav>
			</header>
			<main>
				
				
			</main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>