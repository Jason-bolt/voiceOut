<?php 
  $page = "home";
  include('includes/layouts/header.php'); 
  // confirm_member_logged_in();
  include('includes/layouts/nav_bar.php');
?>

  <!-- Page Content -->
  <!-- <div class="container"> -->

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" style="background-image: url('images/carousel_1.jpg'); background-size: cover;">
      <h1 class="display-3">Welcome to Voice Out!</h1>
      <p class="lead">
        This is a way for students of the University of Cape Coast to voice out their concerns and worries to the school they belong to, to help address matters early.
      </p>
      <!-- <a href="#" class="btn btn-primary btn-lg">Call to action!</a> -->
    </header>


    <!-- Carousel -->
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/carousel_4.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>First News</h5>
          <p>News content</p>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel_5.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
          <h5>Second News</h5>
          <p>News content</p>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/carousel_6.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
          <h5>Third News</h5>
          <p>News content</p>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
<!-- </div> -->

<!-- /Carousel -->



<!-- Page Content -->
<div class="container">

<!-- SIDE BAR -->
<?php include('includes/layouts/side_bar.php'); ?>


<div class="content">
  
  <!-- Page Heading -->
  <h1 class="my-4">
    <strong>
      General school complaints
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  <!-- MAIN CONTENT -->

  <div id="complaints">
    <?php
      $complaintCount = 8;
      $posts = get_general_complaints($complaintCount);

      // checking for posts
      if (mysqli_num_rows($posts) == 0) {
        $display = "none";
    ?>
      <div>
        <p>
          No posts found
        </p>
      </div>
    <?php
      }else{
        $display = "inherit";
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
    }
    ?>

</div>

<?php

  if (mysqli_num_rows($posts)) {
    # code...
  }

?>

<!-- Show more complaints -->
<button class="btn btn-primary pull-right" style="margin-bottom: 40px;">Show more complaints</button>




  <!-- Pagination -->
  <!-- <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul> -->

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">
  // jQuery code
  $(document).ready(function() {
    var complaintCount = 8;
    $("button").click(function() {
      complaintCount = complaintCount + 8;
      $("#complaints").load(
          "includes/raw_php/load_complaints_general.php",
          {
            complaintNewCount: complaintCount
          }
        );
    });
  });
</script>