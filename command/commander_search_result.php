<?php 
  $page = 'home';
  include('../includes/layouts/commander_header.php');
  include('../includes/layouts/commander_nav_bar.php');
?>

<!-- Page Content -->
<div class="container">

<!-- SIDE BAR -->
<?php include('../includes/layouts/commander_side_bar.php'); ?>


<div class="content">
  
  <!-- Page Heading -->
  <h1 class="my-4">
    <strong>
      Search result
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  <!-- MAIN CONTENT -->
  <?php

    if (!isset($_GET['search-submit'])) {
      // User just typed the url in
  ?>
    <div>
      <h4 class="text-center">No search made</h4>
    </div>
    <!-- /.row -->

    <hr />
  <?php
    }else{ // A good search request
      $search_query = $_GET['search'];
      $results = search_results($search_query);
      // print_r($results);
      if (mysqli_num_rows($results) == 0) { // No results found
  ?>
      <div>
        <h4 class="text-center">No result found for keyword <q><?php echo $search_query; ?></q></h4>
      </div>
  <?php
      }else{ // Results are found
        while ($result = mysqli_fetch_assoc($results)) {
  ?>
        <div>
          <?php
            $topic_arr = explode('_', $result['type']);
          ?>
          <h4><?php echo $result['cans_post_subject']; ?> <small>(<?php echo strtoupper($topic_arr[0]). " complaints"; ?>)</small></h4>
          <p>
            <?php echo $result['cans_post_body']; ?>
          </p>
          <small style="color: #777;"><?php echo $result['cans_post_date_published']; ?></small>
        </div>
        <!-- /.row -->
        <hr />
  <?php
        }
      }
    }
  ?>

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('includes/layouts/footer.php'); ?>