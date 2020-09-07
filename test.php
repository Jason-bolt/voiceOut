<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>

<?php
	include('includes/functions/functions.php');
	include('includes/db/db.php');
?>


<?php

if (isset($_GET['submit'])) {
	$username = mysql_prep(trim($_GET['username']));
	$password = password_encrypt(trim($_GET['password']));
	$query = "INSERT into users(username, password) VALUES('$username', '$password')";
	$result = mysqli_query($connection, $query);
}

?>

<body>

<div id="error_message"></div>
<form method="GET" id="form" action="test.php" onsubmit="return validate();">
	<label>Username</label>
	<input type="text" name="username" id="username">
	<label>Password</label>
	<input type="password" name="password" id="password">
	<input type="submit" name="submit" id="submit" value="Submit">
</form>

</body>
</html>


<!-- <script type="text/javascript" src="includes/js/validation.js"></script> -->