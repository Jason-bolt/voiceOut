<?php

	$page = 'home';
	include('../includes/layouts/commander_header.php');
	include('../includes/layouts/commander_nav_bar.php');
	
	if (!isset($_GET['college'])) {
		$college = 'general';
	}else{
		$college = $_GET['college'];
	}

	// echo $_SESSION['delete_message'];

?>

<?php
	if (isset($_SESSION['delete_message'])) {
?>
	<script type="text/javascript">
		alert("<?php echo($_SESSION['delete_message']); ?>")
	</script>
<?php
	}
	$_SESSION['delete_message'] = null;
?>

<!-- Page Content -->
<div class="container">

<!-- SIDE BAR -->
<?php include('../includes/layouts/commander_side_bar.php'); ?>


<div class="content">
  
  <!-- Page Heading -->
  <h1 class="my-4">
    <strong>
      <?php echo strtoupper($college); ?> complaints
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  <!-- MAIN CONTENT -->

  <div id="complaints"></div>



<!-- Show more complaints -->
<button class="btn btn-primary pull-right" style="margin-bottom: 40px;" id="button">Show more complaints</button>

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('../includes/layouts/footer.php'); ?>

<script type="text/javascript">

  // NUMBER OF COMPLAINTS TO BE SHOWN
  const compCount = 8;

  // Get college value from PHP
  var college = '<?php echo($college); ?>';

  switch(college){
  	case 'general':
      var key = 'general';
      break;
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

  var complaints_count = compCount;
  
  window.onload = function (){
    var post_count;
    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', '../includes/raw_php/load_complaints_all.php?complaints_count='+complaints_count+'&college='+college, true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this.responseText);
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
            "<br />" +
            "<a href='../includes/raw_php/command_delete_complaint.php?id=" + posts[i][key+'_post_id'] + "&key=" + key + "' class='btn btn-danger py-0' onclick=\"return confirm('You are about to delete this complaint!')\">Delete</a>" +
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
      complaints_count = complaints_count + compCount;

      // Create new Ajax request
      var xhr = new XMLHttpRequest();

      // Open file
      xhr.open('GET', '../includes/raw_php/load_complaints_all.php?complaints_count='+complaints_count+'&college='+college, true);

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
          "<br />" +
          "<a href='../includes/raw_php/command_delete_complaint.php?id=" + posts[i][key+'_post_id'] + "&key=" + key + "' class='btn btn-danger py-0' onclick=\"return confirm('You are about to delete this complaint!')\">Delete</a>" +
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