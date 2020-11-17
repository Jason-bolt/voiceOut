<?php

	$page = 'admins';
	include('../includes/layouts/commander_header.php');
	include('../includes/layouts/commander_nav_bar.php');

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
      Admins
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  <!-- MAIN CONTENT -->

  <div id="admins"></div>

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('../includes/layouts/footer.php'); ?>

<script type="text/javascript">
 
  window.onload = function (){
    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', '../includes/raw_php/load_admins.php', true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        console.log(this.responseText);
        var admin_json = JSON.parse(this.responseText);

        var admins = "";
  
        admins += "<div>" +
        "<table class='table'>" +
        "<thead>" +
        "<tr>" +
        "<th scope='col'>#</th>" +
        "<th scope='col'>Username</th>" +
        "<th scope='col'>Action</th>" +
        "</tr>" +
        "</thead>" +
        "<tbody>";
        
        var number = 0;
        for(var i in admin_json){
          number = number + 1;
          admins += "<tr>" +
          "<th scope='row'>" + number + "</th>" +
          "<td>" + admin_json[i].commander_name + "</td>" +
          "<td><a class='btn btn-danger py-0'>Delete</a></td>" +
          "</tr>";
        } // for(var i in posts){

        admins += "</tbody>" +
        "</table>" +
        "</div>";

          document.getElementById('admins').innerHTML = admins;
      } // if (this.status == 200) {
    } // xhr.onload = function(){

    // Display xhr file content
    xhr.send();
  } // window.onload = function (){


</script>