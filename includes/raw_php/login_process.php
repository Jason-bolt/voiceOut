<?php
session_start();
include("../functions/functions.php");
include("../db/db.php");


if (!isset($_POST['login_submit'])) {
	redirect_to("../../login.php");
}

// Defining variables
$username = mysql_prep(trim($_POST['username']));
$password = mysql_prep(trim($_POST['password']));

$user = attempt_user_login($username, $password);

if ($user) {
	$_SESSION['user_id'] = $user['user_id'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['password'] = $user['password'];
	redirect_to("../../index.php");
}else{
	$_SESSION['message'] = "Invalid username or password";
	redirect_to("../../login.php");
}


?>