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

<!-- Button to add new admin -->
  <div>
    <button class="btn" style="background-color: #3f009b; color: #FFF;" onclick="showAddForm()">+ Add new admin</button>

    <br />
    <br />
    <br />

    <div style="display: none; width: 60%; margin: auto; text-align: center;" id="add_admin_form">
      <form action="../includes/raw_php/add_admin.php" method="POST" onsubmit="return validateForm()">
        <h4>Add Admin</h4>
        <!-- ERROR MESSAGES -->
        <p class="text-danger" id="emptyField" style="display: none;">Fields can not be left empty!</p>
        <p class="text-danger" id="matching" style="display: none;">Passwords do not match!</p>
        <div class="form-group">
          <input class="form-control" type="text" name="admin_username" placeholder="Username" id="username">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="admin_password" placeholder="Password" id="password">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="admin_password_confirm" placeholder="Confirm password" id="confirm_password">
        </div>
        <div class="form-group">
          <input class="btn" style="background-color: #3f009b; color: #FFF;" type="submit" name="admin_submit" value="Add">
        </div>
      </form>
      <button class="btn btn-danger" onclick="hideAddForm()">Cancel</button>
    </div>

  </div>

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('../includes/layouts/footer.php'); ?>


<script type="text/javascript">
 
  window.onload = function (){

    <?php
      if (isset($_SESSION['admin_status'])) {
    ?>
      alert('<?php echo($_SESSION['admin_status']); ?>');
    <?php
      }$_SESSION['admin_status'] = null;
    ?>
    // create Ajax variable
    var xhr = new XMLHttpRequest();
    // Open file
    xhr.open('GET', '../includes/raw_php/load_admins.php', true);

    // Load contents of file
    xhr.onload = function(){
      if (this.status == 200) {
        // console.log(this.responseText);
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
          "<td><a href='../includes/raw_php/delete_commander.php?id=" + admin_json[i].commander_id + "' class='btn btn-danger py-0 text-white'>Delete</a></td>" +
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


  function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (username.trim() == '' || password.trim() == '' || confirm_password.trim() == ''){
      alert("Fields can not be left empty!");
      document.getElementById("emptyField").style.display = "block";
      return false;
    }

    if (password !== confirm_password) {
      alert("Passwords do not match!");
      document.getElementById("matching").style.display = "block";
      document.getElementById("emptyField").style.display = "none";
      return false;
    }

    return true;
  }

  function showAddForm(){
    document.getElementById("add_admin_form").style.display = "block";
  }

  function hideAddForm() {
    document.getElementById("add_admin_form").style.display = "none";
    document.getElementById("matching").style.display = "none";
    document.getElementById("emptyField").style.display = "none";
  }

</script>