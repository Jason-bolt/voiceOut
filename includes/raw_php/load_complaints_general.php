<?php
  include('../db/db.php');
  include('../functions/functions.php');

  $complaintCount = $_POST['complaintNewCount'];
  $posts = get_general_complaints($complaintCount);
  // checking for posts
      if (mysqli_num_rows($posts) == 0) {
    ?>
      <div>
        <p>
          No posts found
        </p>
      </div>
    <?php
      }else{
        while ($post = mysqli_fetch_assoc($posts)) {
    ?>
      <div>
        <h4><?php echo $post['general_post_subject']; ?></h4>
          <p>
            <?php echo $post['general_post_body']; ?>
          </p>
        <small style="color: #777;"><?php echo $post['general_post_date_published']; ?></small>
      </div>
      <!-- /.row -->
      <hr />
    <?php
      }
    ?>
      <!-- Show more complaints -->
      <button class="btn btn-primary pull-right">Show more complaints</button>
    <?php
    }
    ?>