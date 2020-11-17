<?php
  include('../db/db.php');
  include('../functions/functions.php');
  
  $complaintCount = $_GET['complaints_count'];
  $college = $_GET['college'];
  
  switch ($college) {
    case 'general':
      $posts = get_general_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'cans':
      $posts = get_cans_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'ces':
      $posts = get_ces_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'chls':
      $posts = get_chls_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'code':
      $posts = get_code_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'cohas':
      $posts = get_cohas_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
    case 'sgs':
      $posts = get_sgs_complaints($complaintCount);
      $post = mysqli_fetch_all($posts, MYSQLI_ASSOC);
      echo json_encode($post);
      break;
  }

  ?>