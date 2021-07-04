<?php 
$page = "complaint";
  include('includes/layouts/header.php'); 
  include('includes/layouts/nav_bar.php');
?>

  <!-- Page Content -->
  <!-- <div class="container"> -->

    <!-- Jumbotron Header -->
    <!-- <header class="jumbotron my-4">
      <h1 class="display-3">Welcome to Voice Out!</h1>
      <p class="lead">
        This is a way for students of the University of Cape Coast to voice out their concerns and worries to the school they belong to, to help address matters early.
      </p> -->
      <!-- <a href="#" class="btn btn-primary btn-lg">Call to action!</a> -->
    <!-- </header> -->

<!-- </div> -->

<!-- /Carousel -->



<!-- Page Content -->
<div class="container">

<!-- SIDE BAR -->
<?php include('includes/layouts/side_bar.php'); ?>


<div class="content" style="margin-top: 20px;">
  
  <!-- Page Heading -->
  <h1 class="my-4">
    <strong>
      Make Complaint
    </strong> 
    <!-- <small>Secondary Text</small> -->
  </h1>

  
  <!-- MAIN CONTENT -->
  <form method="POST" action="includes/raw_php/make_complaint_process.php" onsubmit="return validate();">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Area of Complaint</label>
    <select required class="form-control" name="complaint_area">
      <option value="general" selected>General School</option>
      <option value="cans">College of Agriculture and Natural Sciences</option>
      <option value="ces">College of Education Studies</option>
      <option value="chls">College of Humanities & Legal Studies</option>
      <option value="cohas">College of Health and Allied Sciences</option>
      <option value="code">College of Distance Education</option>
      <option value="sgs">School of Graduate Studies</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Complaint subject</label>
    <input id="complaint_subject" name="complaint_subject" required type="text" class="form-control" placeholder="Subject...">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Complaint message</label>
    <textarea id="complaint_message" name="complaint_message" required class="form-control" rows="3"></textarea>
  </div>

  <div class="form-group">
    <button style="background-color: #3f009b; color: #fff;" type="submit" class="btn mb-2" name="complaint-submit">Submit</button>
  </div>
</form>

<br />

<div style="color: red;">
  <div style="font-size: 20px;">
    <u>Note: </u>
  </div>
  <ul>
    <li>Your index number will be attached to your post so becareful the content.</li>
    <li>Any complaint committed can only be removed by management.</li>
  </ul>
</div>

  <!-- ./MAIN CONTENT -->

</div>
<!-- /.content -->

</div>
<!-- /.container -->

<div class="clr"></div>

<?php include('includes/layouts/footer.php'); ?>

<script type="text/javascript">
  function validate(){
    var subject = document.getElementById("complaint_subject").value;
    if (subject.trim() == ""){
      alert("Subject cannot be empty!");
      return false;
    }
    var message = document.getElementById("complaint_message").value;
    if (message.trim() == ""){
      alert("Message cannot be empty!");
      return false;
    }

    return true;
  }
  
</script>


<?php

if (isset($_SESSION['message'])) {
  echo "string";
?>
  <script type="text/javascript">
    alert('<?php echo $_SESSION['message']; ?>');
  </script>
<?php
}
$_SESSION['message'] = null;

?>