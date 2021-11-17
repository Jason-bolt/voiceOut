<?php

function redirect_to($website){
	header("Location: " . $website);
	exit;
}

function query_check($query){
	if (!$query) {
		die("Database query failed");
	}
}

function mysql_prep($string){
	global $connection;
	$escaped_string = mysqli_real_escape_string($connection, $string);
	return $escaped_string;
}

function form_errors($errors=array()){
	$output = "";
	if (!empty($errors)) {
		$output = "<div class=\"message\">";
		$output .= "<p>Please fix these errors:</p>";
		foreach ($errors as $key => $error) {
			// $output .= "<p>=>";
			$output .= htmlentities($error);
			// $output .= "</p>";
		}
		$output .= "</div>";
	}	
	return $output;
}


// MEMBER LOGGED IN
function confirm_user_logged_in(){
	if (!user_logged_in()) {
		redirect_to("login.php");
	}
}

function user_logged_in(){
	return isset($_SESSION["user_id"]);
}


// ADMIN LOGGED IN
function confirm_commander_logged_in(){
	if (!commander_logged_in()) {
		redirect_to("command_login.php");
	}
}

function commander_logged_in(){
	return isset($_SESSION["commander_id"]);
}

// INSERTING COMPLAINTS INTO THE DATABASE
function post_cans_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into cans_posts( ";
	$query .= "cans_post_subject, cans_post_body, cans_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}

function post_ces_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into ces_posts( ";
	$query .= "ces_post_subject, ces_post_body, ces_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}

function post_chls_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into chls_posts( ";
	$query .= "chls_post_subject, chls_post_body, chls_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}

function post_code_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into code_posts( ";
	$query .= "code_post_subject, code_post_body, code_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}

function post_cohas_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into cohas_posts( ";
	$query .= "cohas_post_subject, cohas_post_body, cohas_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}

function post_general_complaint($subject, $body, $date_published, $username){
	global $connection;

	$query = "INSERT into general_posts( ";
	$query .= "general_post_subject, general_post_body, general_post_date_published, username";
	$query .= ") VALUE (";
	$query .= "'$subject', '$body', '$date_published', '$username')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		return true;
	}else{
		return false;
	}
}


// RETREIVING COMPLAINT POSTS
function get_general_complaints($count){
	global $connection;

	$query = "SELECT * FROM general_posts ORDER BY general_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_cans_complaints($count){
	global $connection;

	$query = "SELECT * FROM cans_posts ORDER BY cans_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_ces_complaints($count){
	global $connection;

	$query = "SELECT * FROM ces_posts ORDER BY ces_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_chls_complaints($count){
	global $connection;

	$query = "SELECT * FROM chls_posts ORDER BY chls_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_code_complaints($count){
	global $connection;

	$query = "SELECT * FROM code_posts ORDER BY code_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_cohas_complaints($count){
	global $connection;

	$query = "SELECT * FROM cohas_posts ORDER BY cohas_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_sgs_complaints($count){
	global $connection;

	$query = "SELECT * FROM sgs_posts ORDER BY sgs_post_id DESC LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function search_results($search_query){
	global $connection;

	$query = "SELECT *, 'cans_posts' as type from cans_posts WHERE cans_post_subject LIKE '%". $search_query ."%'" ;
	$query .= " UNION";
	$query .= " SELECT *, 'ces_posts' as type from ces_posts WHERE ces_post_subject LIKE '%". $search_query ."%'";
	$query .= " UNION";
	$query .= " SELECT *, 'chls_posts' as type from chls_posts WHERE chls_post_subject LIKE '%". $search_query ."%'";
	$query .= " UNION";
	$query .= " SELECT *, 'code_posts' as type from code_posts WHERE code_post_subject LIKE '%". $search_query ."%'";
	$query .= " UNION";
	$query .= " SELECT *, 'cohas_posts' as type from cohas_posts WHERE cohas_post_subject LIKE '%". $search_query ."%'";
	$query .= " UNION";
	$query .= " SELECT *, 'general_posts' as type from general_posts WHERE general_post_subject LIKE '%". $search_query ."%'";
	$query .= " UNION";
	$query .= " SELECT *, 'sgs_posts' as type from sgs_posts WHERE sgs_post_subject LIKE '%". $search_query ."%'";

	$results = mysqli_query($connection, $query);
	query_check($results);
	return $results;
}


// GET ALL ADMINS
function get_commanders(){
	global $connection;

	$query = "SELECT commander_id, commander_name FROM commanders";
	$results = mysqli_query($connection, $query);
	return $results;
}
	

// SELECT *, 'cans_posts' as type from cans_posts WHERE cans_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'ces_posts' as type from ces_posts WHERE ces_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'chls_posts' as type from chls_posts WHERE chls_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'code_posts' as type from code_posts WHERE code_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'cohas_posts' as type from cohas_posts WHERE cohas_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'general_posts' as type from general_posts WHERE general_post_subject LIKE '%hea%'
// UNION
// SELECT *, 'sgs_posts' as type from sgs_posts WHERE sgs_post_subject LIKE '%hea%'



?>
