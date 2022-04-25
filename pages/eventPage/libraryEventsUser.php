<?php

    /*
        Date Created: 2022_04_07 by Nathan Brueckner *NOTE: Derived from Kenneth Dang's libraryEvents.html*
	    Purpose of file:
		    Library events page for users.
    */

    session_start();
    
	if(!isset($_SESSION['user']))
	{
        if(isset($_SESSION['admin']))
        {
            header('Location: libraryEventsAdmin.php');
        }
        else
        {
            header('Location: libraryEvents.php');
        }
	}

?>


	<html style="width: 100vw;">
		<head>
			<title>
				Texan Cougarways
			</title>
			<link rel="stylesheet" href="../../styling/libraryEvents.css">
		</head>
		<body>
			<header>
				<h1> Texan Cougarways Library Branch </h1>
				<nav id = "navbar">
					<?php
                        require "../userHeader.php";
                    ?>
				</nav>
			</header>
			<main>
				<div class = "video-panel">
					<div class = "video-wrapper">
						<div class = "controls">
							<div class="left-slideshow-button" onclick="plusDivs(-1)"> &#10094; </div> <!-- &#10094; and &#10095; are langle and rangle characters -->
							<div class="right-slideshow-button" onclick="plusDivs(1)"> &#10095; </div>
						</div>
						
						<!-- Attach all video events here. -->
						<video class = "mySlides" autoplay muted>
							<source src="../../images/Banners/WeLoveGasPrices2.mp4" type="video/mp4">
						</video>
						<video class = "mySlides" autoplay muted>
							<source src="../../images/Banners/SmithWillSlapYou.mp4" type="video/mp4">
						</video>
						<video class = "mySlides" autoplay muted>
							<source src="../../images/Banners/FriendsofTexanCougarwaysMeeting.mp4" type="video/mp4">
						</video>
						<video class = "mySlides" autoplay muted>
							<source src="../../images/Banners/LearntoBeaTexan.mp4" type="video/mp4">
						</video>
						<!-- //////////////// -->
						
					</div>
				</div>
				<script>
					var slideIndex = 1;
					showDivs(slideIndex);

					function plusDivs(n) {
						showDivs(slideIndex += n);
					}

					function showDivs(n) {
						var i;
						var x = document.getElementsByClassName("mySlides");
						if (n > x.length) {
							slideIndex = 1
						}
						if (n < 1) {
							slideIndex = x.length
						}
						for (i = 0; i < x.length; i++) {
							x[i].style.display = "none";  
						}
						x[slideIndex-1].style.display = "block";  
					}
				</script>
			</main>
			<footer>
				<p id = "copyrightinfo"> © 2021-2022 Houston Team 16 </p>
			</footer>
		</body>
	</html>