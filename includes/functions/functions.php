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


// PASSWORD FUNCTIONS
function password_encrypt($password){
	$hash_format = "$2y$10$"; // Tells PHP to use Blowfish with "cost" of 10
	$salt_length = 22; // Blowfish salts should be 22-characters or more
	$salt = generate_salt($salt_length);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function generate_salt($length){
	// Not 100% unique or random
	// MD5 returns 32 characters
	$unique_random_string = md5(uniqid(mt_rand(), true));
	// Valid characters for salt ar [a-zA-Z0-9./]
	$base64_string = base64_encode($unique_random_string);
	// But not '+' which is valid in base64 encoding
	$modified_base64_string = str_replace('+', '.', $base64_string);
	// Truncate to the correct length
	$salt = substr($modified_base64_string, 0, $length);
	return $salt;
}

function password_check($password, $existing_hash){
	// Existing hash contains format and salt to start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash) {
		return true;
	}else{
		return false;
	}
}

function attempt_user_login($username, $password){
	$user = get_user_by_username($username);
	if ($user) {
		// Found user, now check passord
		if (password_check($password, $user["password"])) {
			// Password matches
			return $user;
		}else{
			// Password was not match
			return false;
		}
	}else{
		// Admin not found
		return false;
	}
}

function get_user_by_username($username){
	global $connection;

	$query = "SELECT * FROM users ";
	$query .= "WHERE username = '$username' LIMIT 1";
	$results = mysqli_query($connection, $query);
	if ($result = mysqli_fetch_assoc($results)) {
		return $result;
	}else{
		return null;
	}
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

	$query = "SELECT * FROM general_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_cans_complaints($count){
	global $connection;

	$query = "SELECT * FROM cans_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_ces_complaints($count){
	global $connection;

	$query = "SELECT * FROM ces_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_chls_complaints($count){
	global $connection;

	$query = "SELECT * FROM chls_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_code_complaints($count){
	global $connection;

	$query = "SELECT * FROM code_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_cohas_complaints($count){
	global $connection;

	$query = "SELECT * FROM cohas_posts LIMIT {$count}";
	$results = mysqli_query($connection, $query);
	return $results;
}

function get_sgs_complaints($count){
	global $connection;

	$query = "SELECT * FROM sgs_posts LIMIT {$count}";
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