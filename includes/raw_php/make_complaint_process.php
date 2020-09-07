<?php
include('../db/db.php');
include('../functions/functions.php');
session_start();
confirm_user_logged_in();

if (!isset($_POST['complaint-submit'])) {
	redirect_to('../../make_complaint.php');
}

// Getting complaint data
$complaint_area = $_POST['complaint_area'];
$complaint_subject = mysql_prep(trim($_POST['complaint_subject']));
$complaint_message = mysql_prep(trim($_POST['complaint_message']));
$username = $_SESSION['username'];

// getting timestamp
date_default_timezone_set("Etc/GMT-0");
$date_published = date("l jS \of F Y h:i:s A");

// Post complaint depending on the area
switch ($complaint_area) {
	case 'general':
		if (post_general_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'cans':
		if (post_cans_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'ces':
		if (post_ces_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'chls':
		if (post_chls_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'code':
		if (post_code_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'cohas':
		if (post_cohas_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;

	case 'sgs':
		if (post_sgs_complaint($complaint_subject, $complaint_message, $date_published, $username)){
			$_SESSION['message'] = "Posted successfully";
			redirect_to("../../make_complaint.php");
		}else{
			$_SESSION['message'] = "Posting failed";
			redirect_to("../../make_complaint.php");
		}
		break;
	
	default:
		redirect_to("../../make_complaint.php");
		break;
}

// echo $complaint_area;
// echo "<br />";
// echo $complaint_subject;
// echo "<br />";
// echo $complaint_message;
// echo "<br />";
// echo $date_published;
// echo "<br />";
// echo $username;



?>