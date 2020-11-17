<?php

	session_start();
	include("../functions/functions.php");
	include("../db/db.php");

	if (!isset($_GET['id']) && !isset($_GET['key'])) {
		redirect_to('../../command/command.php');
	}

	$id = $_GET['id'];
	$key = $_GET['key'];
	$table = $key . '_posts';
	$identifier = $key . '_post_id';

	// echo $identifier;
	// DELETE QUERY
	$query = "DELETE FROM {$table} WHERE {$identifier} = {$id}";
	$result = mysqli_query($connection, $query);
	if ($result) {
		// echo "Complaint deleted";
		$_SESSION['delete_message'] = "Complaint deleted!";
		redirect_to('../../command/command.php?college='.$key);
	}else{
		// echo "Could not delete complaint";
		$_SESSION['delete_message'] = "Could not delete complaint!";
		redirect_to('../../command/command.php?college='.$key);
	}

?>