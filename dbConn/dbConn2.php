<?php

	/*
		Date Created: 2022_04_14 by Nathan Brueckner
		Purpose of file:
			This file is a different dbConnection file using mySqli instead of PDO. mySQLi is easier to use for our tables.
		Sources:
			https://www.w3schools.com/php/php_mysql_connect.asp
	*/


	$host = "mysql.cosc3380team16.online";
	//$host = "localhost";
	$db_name = "cosc3380team16db2";
	$user = "team16";
	$password = "team16pass";
	//$user = "root";
	//$password = "";

	//Connect to the database.
    $connection = mysqli_connect($host, $user, $password, $db_name);
	
?>