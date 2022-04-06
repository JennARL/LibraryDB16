<!--
	Date Created: 2022_03 by Kenneth Dang
	Date Modified: 2022_04 by Kenneth Dang
	Date Modified: 2022_04_03 by Nathan Brueckner
		Modification Details: Changed naming conventions of files and file structure, meaning updates needed for links.
	Date Modified: 2022_04_03 by Nathan Brueckner
		Modification Details: Added session logic to redirect the user to the appropriate dashboard if already logged in.
	Purpose of file:
		Home page while not logged in.
-->

<?php
    session_start();

    if(isset($_SESSION['admin']))
    {
        header('Location: adminPortal.php');
    }
    else if(isset($_SESSION['user']))
    {
        header('Location: userPortal.php');
    }

    require_once('dbConn/dbConn.php');
?>

<DOCTYPE !html>
	<html>
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
					<ul id = "navbar-list">
						<li class = "navli"> <a href = "aboutUs.html"> About Us </a></li>
						<li class = "navli"> <a href = "pages/loginPage/loginPage.php"> User Login </a></li>
						<li class = "navli"> <a href = "pages/eventPage/libraryEvents.html"> Library Events </a></li>
						<li class = "navli"> <a href = "pages/studyRoomPage/requestStudyRoom.html"> Request Study Room </a></li>
						<li class = "navli"> <a href = "pages/itemPage/requestItem.html"> Request Item </a></li>
						<li class = "navli"> <a href = "pages/catalogPage/libraryCatalog.html"> Library Catalog </a></li>
						<li class = "navli"> <a href = "index.html"> Home </a></li>
					</ul>
				</nav>
			</header>
			<main>
				<div class="weatherWidget" > </div>
				<script>
					window.weatherWidgetConfig =  window.weatherWidgetConfig || [];
					window.weatherWidgetConfig.push(
						{
						selector:".weatherWidget",
						apiKey:"3EBA2W6863T2RHJBQWXXR677Q", //Sign up for your personal key
						location: "Houston, TX", 
						unitGroup: "metric",
						forecastDays: 1,
						title: "Current Weather",
						showTitle:true, 
						showConditions:true
						}
					);

					(function() {
						var d = document, s = d.createElement('script');
						s.src = 'https://www.visualcrossing.com/widgets/forecast-simple/weather-forecast-widget-simple.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
				</script>
			</main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>