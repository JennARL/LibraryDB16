<?php
    /*
	Date Created: 2022_03 by Kenneth Dang
	Date Modified: 2022_04 by Kenneth Dang
	Date Modified: 2022_04_03 by Nathan Brueckner
		Modification Details: Changed naming conventions of files and file structure, meaning updates needed for links.
	Date Modified: 2022_04_03 by Nathan Brueckner
		Modification Details: Added session logic to redirect the user to the appropriate dashboard if already logged in.
    Date Modified: 2022_04_07 by Nathan Brueckner
        Modification Details: Moved the header to a file instead of having it here.
    Date Modified: 2022_04_07 by Nathan Brueckner
        Modification Details: Moved the header links back to here instead of a separate file.
    Date Modified: 2022_04_18 by Jenn Landicho
        Modification Details: Complete redesign of Home page
    Date Modified: 2022_04_23 by Nathan Brueckner
                Modification Description: Removed library events page
	Purpose of file:
		Home page while not logged in.
    Source:
        https://stackoverflow.com/questions/8988855/include-another-html-file-in-a-html-file Used to learn how to integrate a JS script into HTML (also for building the JS script, referenced on the header.js file)
            Source made irrelevant because JS files were replaced with PHP files. Kept here for notation.
    */
	session_start();
    //echo $_SESSION['admin'];
    //print_r($_SESSION);
	if(isset($_SESSION['admin']))
	{
		header('Location: adminPortal.php');
	}
	else if(isset($_SESSION['user']))
	{
		header('Location: userPortal.php');
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
                        <li class = "navli"> <a href = "pages/loginPage/login.php"> Login </a></li>
                        <!--<li class = "navli"> <a href = "pages/eventPage/libraryEvents.php"> Library Events </a></li>-->
                        <li class = "navli"> <a href = "pages/studyRoomPage/requestStudyRoom.php"> Request Study Room </a></li>
                        <li class = "navli"> <a href = "pages/itemPage/requestItem.php"> Request Item </a></li>
                        <li class = "navli"> <a href = "pages/catalogPage/libraryCatalog.php"> Library Catalog </a></li>
                        <li class = "navli"> <a href = "index.php"> Home </a></li>
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
                            <td style="text-align: center;">Closed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            

            <div id="location">
                Location
                <br>
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