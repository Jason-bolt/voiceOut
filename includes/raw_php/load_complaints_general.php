<?php
  include('../db/db.php');
  include('../functions/functions.php');

  $complaintCount = $_GET['complaints_count'];
  $posts = get_general_complaints($complaintCount);

  // checking for posts
  $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
  echo json_encode($post);

?>