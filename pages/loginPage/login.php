<?php
    /*
        Date Created: 2022_03 by Kenneth Dang
        Date Modified: 2022_04 by Kenneth Dang
        Date Modified: 2022_04_03 by Nathan Brueckner
            Modification Details: Changed naming conventions of files and file structure, meaning updates needed for links.
        Date Modified: 2022_04_03 by Nathan Brueckner
            Modification Details: Added PHP logic to direct the user to the appropriate page based on session variables.
        Date Modified: 2022_04_05 by Nathan Brueckner
            Modification Details: Added Ajax POST method to send login form info to loginLogic.php, where the information is processed.
                Based on this processing, the user will be directed to loginDecision.php if a login matches, then will be directed to either the admin portal or the user portal.
        Date Modified: 2022_04_06 by Nathan Brueckner
            Modification Details: Removed Ajax POST method because of errors with jQuery - Changed to basic HTML post method, posting to loginLogic.php.
                Page direction is no longer handled by login.php unless user is already logged in.
        Date Modified: 2022_04_06 by nathan Brueckner
            Modification Details: Changed session logic at the beginning from header redirection method to javascript injection to redirect page. Header wasn't working.
                Note: I think the header doesn't work because of the notation at the top here. Header doesn't work when there is any output before its called.
        Date Modified: 2022_04_06 by Nathan Brueckner
            Modification Details: Changed session logic back to header redirection method because I found that HTML comments before the file were the reason they were failing.
        Date Modified: 2022_04_07 by Nathan Brueckner
            Modification Details: Changed header to call from header.php
        Purpose of file:
            Login page, which will direct to either the staff/admin page or the student/faculty page.
        Sources:
            https://stackoverflow.com/questions/16735747/php-redirect-if-not-logged-in   Used to understand login/logout based on session variables.
            https://stackoverflow.com/questions/1960240/jquery-ajax-submit-form Used to understand how to post data from form to database.
    */
	session_start();

	if(isset($_SESSION['admin']))
	{
        header('Location: ../../adminPortal.php');
	}
	else if(isset($_SESSION['user']))
	{
        header('Location: ../../userPortal.php');
	}

?>

	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/loginPage.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
					<?php
                        require "../header.php";
                    ?>
				</nav>
			</header>
				<main>
					<!-- Log In Form -->
					<form id = "login-panel" action = "loginLogic.php" method = "POST">
						<h2 class = "form-title"> Log In Below </h2>
						<div class = "username signinbox">
							<h3> Username </h3>
							<input name = "username" type = "text" placeholder = "Enter your library username" class = "signininfo" required>
						</div>
						<div class = "userpassword signinbox">
							<h3> Password </h3>
							<input name = "password" type = "password" placeholder = "Enter your password" class = "signininfo" required>
						</div>
						<div class = "open_close_part_user">
							<input type = "submit" name = "login_button" value = "Login" class = "loginbutton">
						</div>
					</form>
				</main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>
