<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "voice_out");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_error()) {
	die("Database connection failed " .
		"Error message: " .
		mysqli_connect_error()
		);
}

?>