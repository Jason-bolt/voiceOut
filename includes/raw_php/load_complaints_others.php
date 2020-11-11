<?php
  include('../db/db.php');
  include('../functions/functions.php');
  
  $complaintCount = $_POST['complaintNewCount'];
  $college = $_POST['college'];

  switch ($college) {
    case 'cans':
      $posts = get_cans_complaints($complaintCount);
      $key = 'cans';
      break;
    case 'ces':
      $posts = get_ces_complaints($complaintCount);
      $key = 'ces';
      break;
    case 'chls':
      $posts = get_chls_complaints($complaintCount);
      $key = 'chls';
      break;
    case 'code':
      $posts = get_code_complaints($complaintCount);
      $key = 'code';
      break;
    case 'cohas':
      $posts = get_cohas_complaints($complaintCount);
      $key = 'cohas';
      break;
    case 'sgs':
      $posts = get_sgs_complaints($complaintCount);
      $key = 'sgs';
      break;
  }

  if (mysqli_num_rows($posts) == 0) { // No posts found
?>
  <div>
    <p>
      No posts found
    </p>
  </div>
<?php
  }else{ // Posts found
    while ($post = mysqli_fetch_assoc($posts)) {
  ?>
    <div>
      <h4><?php echo $post[$key.'_post_subject']; ?></h4>
      <p>
        <?php echo $post[$key.'_post_body']; ?>
      </p>
      <small style="color: #777;"><?php echo $post[$key.'_post_date_published']; ?></small>
    </div>
    <!-- /.row -->

    <hr />

  <?php
    }
  }
  ?>