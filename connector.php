<?php
	try {
		$host = '127.0.0.1';
		$dbname = 'library';
		$user = 'root';
		$pass = '';

		//connecting with the database
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
		echo "Connection failed: ".$e->getMessage();
	}
?>