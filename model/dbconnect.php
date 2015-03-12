<?php
// include this file where ever you connect to the database

 //*** Connect to the database ***
	// path to file where you define variables for the connection.
	include '../config/dbcred.php';
		/* example: 
				$dbname = "name_somedatabase";
				$username = "name_someuser";
				$password = "your-password";
				$hostname = "localhost";
			Be sure to add this cred file to your .gitignore file.
		*/
	
	// (now to actually connect)
	try {
		$dbh = new PDO("mysql:host=$hostname;
				dbname=$dbname", $username, $password);
		// for debugging:
		//echo "<p>Connected to database.</p>";
	} catch (PDOException $e) {
		// to report errors:
		echo $e->getMessage();
	}
?>