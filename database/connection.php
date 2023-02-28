<?php
	$servername = 'localhost:3307';
	$username = 'root';
	$password = '';

	// Connecting to database
	try{
		$conn = new PDO("mysql:host=$servername;dbname=vintage", $username, $password);
		// set the PDO error mode to the exeception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch(\Exception $e) {
		$error_message = $e->getMessage();
	}

?>