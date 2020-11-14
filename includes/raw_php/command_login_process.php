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

$commander = attempt_commander_login($username, $password);

if ($commander) {
	$_SESSION['commander_id'] = $commander['commander_id'];
	$_SESSION['commander_name'] = $commander['commander_name'];
	$_SESSION['commander_password'] = $commander['commander_password'];
	redirect_to("../../command/command.php");
}else{
	$_SESSION['message'] = "Invalid username or password";
	redirect_to("../../command/command_login.php");
}


?>