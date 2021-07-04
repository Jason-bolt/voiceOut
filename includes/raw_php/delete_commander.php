<?php
  session_start();
  include('../db/db.php');
  include('../functions/functions.php');

  if (!commander_logged_in()) {
    redirect_to("../../command/command_login.php");
  }

  $commander_id = trim($_GET["id"]);

  // Query to remove new Admin
  $query = "DELETE FROM commanders WHERE commander_id = {$commander_id}";
  query_check($query);
  $result = mysqli_query($connection, $query);

  if ($result) {
    $_SESSION['admin_status'] = "Admin deleted successfully!";
    redirect_to("../../command/admins.php");
  }else{
    $_SESSION['admin_status'] = "Could not delete admin!";
    redirect_to("../../command/admins.php");
  }

  ?>