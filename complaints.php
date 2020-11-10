<?php 
  $page = "home";
  include('includes/layouts/header.php'); 
  include('includes/layouts/nav_bar.php');
?>

<?php
  $college = $_GET['college'];
?>

  <!-- Page Content -->
  <!-- <div class="container"> -->

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" style="background-image: url( 
      <?php
//         if ($college == 'cans') {
//           echo "images/cans.png";
//         }else
        switch ($college) {
          case 'cans':
            echo "images/cans.png";
            break;
          case 'ces':
            echo "images/ces.png";
            break;
          case 'chls':
            echo "images/chls.png";
            break;
          case 'code':
            echo "images/code.png";
            break;
          case 'cohas':
            echo "images/cohas.png";
            break;
          case 'sgs':
            echo "images/sgs.jpg";
            break;
          default:
            null;
            redirect_to('index.php');
            break;
        }
      ?>
    ); background-size: 100%; min-height: 300px; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
     <!--  <h1 class="display-3">Welcome to Voice Out!</h1>
      <p class="lead">
        This is a way for students of the University of Cape Coast to voice out their concerns and worries to the school they belong to, to help address matters early.
      </p> -->
      <!-- <a href="#" class="btn btn-primary btn-lg">Call to action!</a> -->
    </header>


<!-- Page Content -->
<div class="container">

<!-- SIDE BAR -->
<?php include('includes/layouts/side_bar.php'); ?>


<div class="content">
  
  <!-- Page Heading -->
  <h1 class="my-4">
    <strong>
      <?php echo strtoupper($college); ?> complaints
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  <div id="complaints">
    <!-- MAIN CONTENT -->
  <?php
    $complaintCount = 1;
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
    ?>
    <!-- Show more complaints -->
  <button class="btn btn-primary pull-right">Show more complaints</button>
    <?php
    }

    ?>
  </div>
  <!-- End of complaints -->

  

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
    var complaintCount = 1;
    $("button").click(function() {
      complaintCount = complaintCount + 1;
      $("#complaints").load(
          "includes/raw_php/load_complaints_others.php",
          {
            complaintNewCount: complaintCount,
            college: <?php echo $college; ?>
          }
        );
    });
  });
</script>