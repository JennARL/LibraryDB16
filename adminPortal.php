<?php
    /*
        Date Created: 2022_04_03 by Nathan Brueckner
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Centralized the header in headers page because I had to edit it on several different pages with every change.
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Moved header links back here because it was unnecessary to break into another file until going to the pages/ directory.
        Date Modified: 2022_04_18 by Jenn Landicho
            Modification Details: Complete redesign of Home page
        Date Modified: 2022_04_19: by Jenn Landicho
            Modification Details: Reformatting home page header.
        Date Modified: 2022_04_23 by Nathan Brueckner
                Modification Description: Removed library events page
	    Purpose of file:
		    Home page if you are an admin.
        Source:
            https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file I (Nathan Brueckner) used a solution on this post to show me how to call the JS script created in the header folder (also learned from this                post). Source made irrelevant because files were replaced with PHP. Kept here for notation.
    */
	session_start();
    //echo $_SESSION['admin'];
	if(!isset($_SESSION['admin']))
	{
        if(isset($_SESSION['user']))
        {
            header('Location: userPortal.php');
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
			<link rel="stylesheet" href="styling/aboutus.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
                    <ul>
                        <li class = "navli"> <a href = "pages/loginPage/logout.php"> Logout </a></li>
                        <!--<li class = "navli"> <a href = "pages/eventPage/libraryEventsAdmin.php"> Library Events </a></li>-->
                        <li class = "navli"> <a href = "pages/studyRoomPage/requestStudyRoomAdmin.php"> Request Study Room </a></li>
                        <li class = "navli"> <a href = "pages/itemPage/requestItemAdmin.php"> Request Item </a></li>
                        <li class = "navli"> <a href = "pages/catalogPage/libraryCatalogAdmin.php"> Library Catalog </a></li>
                        <li class = "navli"> <a href = "pages/userListPage/userListAdmin.php"> User List </a></li>
                        <li class = "navli"> <a href = "pages/accountInfoPage/adminInfo.php"> Account </a></li>
                        <li class = "navli"> <a href = "adminPortal.php"> Home </a></li>
                    </ul>
				</nav>
			</header>
			<main>
                <div class="scrolly">
                <div id="aboutus">
                    
                    <p>
                    About Us
                    <br>
                    Texan Cougarways was formed in 1950s by a group 
                        of hardworking UH alumni. They sought to provide easily 
                        accessible educational material to the area and to college 
                        students at UH.</p>
                </div>

                <div id="hours">
                    
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Day
                                </th>
                                <th>
                                    Hours
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td>10:00am - 6:00pm</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>10:00am - 9:00pm</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>10:00am - 6:00pm</td>
                            </tr>
                            <tr>
                                <td>Thursday </td>
                                <td>10:00am - 9:00pm</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>10:00am - 6:00pm</td>
                            </tr>
                            <tr>
                                <td>Saturday </td>
                                <td>10:00am - 6:00pm</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>Closed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                <div id="location">
                    Location
                    <a href="https://www.google.com/maps/dir/29.7161834,-95.3416264/md+anderson+library/@29.7184749,-95.3444134,17z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x8640c0748ba2522f:0x2a3f0ce5297e9c3a!2m2!1d-95.342048!2d29.721084">42069 University Blvd, Houston, TX 77004</a>
                </div>

                <div id="services">
                    we offer services
                </div>

                <div id="spacehaver">
                    
                </div>
                </div>

                <div id="bigside">
                    <div id="welcome">
                        Welcome to Texan Cougarways
                    </div>

                </div>

            </main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>