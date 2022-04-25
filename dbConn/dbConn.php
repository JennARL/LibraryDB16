<?php

	/*
		Date Created: 2022_04_03 by Nathan Brueckner
		Purpose of file:
			This file has all of the information needed to connect to the database and makes the connection.
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
	try
	{
		$connection = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch(PDOException $exception)
	{
		exit();
	}
?>