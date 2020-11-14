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
            $key = 'cans';
            break;
          case 'ces':
            echo "images/ces.png";
            $key = 'ces';
            break;
          case 'chls':
            echo "images/chls.png";
            $key = 'chls';
            break;
          case 'code':
            echo "images/code.png";
            $key = 'code';
            break;
          case 'cohas':
            echo "images/cohas.png";
            $key = 'cohas';
            break;
          case 'sgs':
            echo "images/sgs.jpg";
            $key = 'sgs';
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

  <div id="complaints"></div>
  <!-- End of complaints -->

  <!-- Show more complaints -->
  <button class="btn btn-primary pull-right" style="margin-bottom: 40px;" id="button">Show more complaints</button>

  

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">

  // Get college value from PHP
  var college = '<?php echo($college); ?>';

  switch(college){
    case 'cans':
      var key = 'cans';
      break;
    case 'ces':
      var key = 'ces';
      break;
    case 'chls':
      var key = 'chls';
      break;
    case 'code':
      var key = 'code';
      break;
    case 'cohas':
      var key = 'cohas';
      break;
    case 'sgs':
      var key = 'sgs';
      break;
    default:
      null; 
  }

  var complaints_count = 8;
  
  window.onload = function (){
    var post_count;
    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', 'includes/raw_php/load_complaints_others.php?complaints_count='+complaints_count+'&college='+college, true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this.responseText);
        console.log(this.responseText);
        var posts = JSON.parse(this.responseText);

        var complaints = '';
        
        if (posts == "") {
          complaints += "<div>" +
          "<p> No posts found </p>" +
          "</div>";
          document.getElementById('button').style.display = "none";
        }else{
          for(var i in posts){
            complaints += "<div>" +
            "<h4>" + posts[i][key+'_post_subject'] + "</h4>" +
            "<p>" + posts[i][key+'_post_body'] + "</p>" +
            "<small style='color: #777;'>" + posts[i][key+'_post_date_published'] + "</small>" +
            "<hr />" +
            "</div>";
            post_count = i;
          } // for(var i in posts){
        } // }else{

          document.getElementById('complaints').innerHTML = complaints;
          if (complaints_count > post_count + 1) {
            document.getElementById('button').style.display = "none";
          }
      } // if (this.status == 200) {
    } // xhr.onload = function(){

    // Display xhr file content
    xhr.send();
  } // window.onload = function (){


    // BUTTON TO DISPLAY THE OTHER COMPLAINTS

    document.getElementById('button').addEventListener('click', moreComplaints);

    function moreComplaints(){
      complaints_count = complaints_count + 8;

      // Create new Ajax request
      var xhr = new XMLHttpRequest();

      // Open file
      xhr.open('GET', 'includes/raw_php/load_complaints_others.php?complaints_count='+complaints_count+'&college='+college, true);

      // Load file
      xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this.responseText);
        var posts = JSON.parse(this.responseText);

        var complaints = '';
        
        for(var i in posts){
          complaints += "<div>" +
          "<h4>" + posts[i][key+'_post_subject'] + "</h4>" +
          "<p>" + posts[i][key+'_post_body'] + "</p>" +
          "<small style='color: #777;'>" + posts[i][key+'_post_date_published'] + "</small>" +
          "<hr />" +
          "</div>";
          post_count = i;
        
        } // for(var i in posts){

          document.getElementById('complaints').innerHTML = complaints;
          if (complaints_count > parseInt(post_count) + 1) {
            document.getElementById('button').style.display = "none";
          }
      } // if (this.status == 200) {
    } // xhr.onload = function(){

    // Display xhr file content
    xhr.send();
  }

</script>