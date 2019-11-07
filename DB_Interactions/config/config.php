<?php

// define('ROOT_URL', 'http://localhost/phpsandbox/website8/');
define('DB_HOST', 'localhost');
define('DB_USER', 'me   ');
define('DB_PASS', 'password');
define('DB_NAME', 'BlogDB');


	// Create Connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check Connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}