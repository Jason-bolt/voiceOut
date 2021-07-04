<?php
  session_start();
  include('../db/db.php');
  include('../functions/functions.php');
  
  if (!isset($_POST["admin_submit"])) {
    redirect_to("../../command/admins.php");
  }

  $admin_username = trim($_POST["admin_username"]);
  $admin_password = trim($_POST["admin_password"]);
  $admin_password_confirm = trim($_POST["admin_password_confirm"]);

  if ($admin_username == '' || $admin_password == '' || $admin_password_confirm == '') {
    $_SESSION['admin_status'] = "No field can be left empty!";
    redirect_to("../../command/admins.php");
  }

  if ($admin_password !== $admin_password_confirm) {
    $_SESSION['admin_status'] = "Passwords do not match!";
    redirect_to("../../command/admins.php");
  }

  $hashed_password = password_encrypt($admin_password);

  // Query to add new Admin
  $query = "INSERT INTO commanders(commander_name, commander_password) VALUES('{$admin_username}', '{$hashed_password}')";
  query_check($query);
  $result = mysqli_query($connection, $query);

  if ($result) {
    $_SESSION['admin_status'] = "Admin added successfully!";
    redirect_to("../../command/admins.php");
  }else{
    $_SESSION['admin_status'] = "Could not add admin!";
    redirect_to("../../command/admins.php");
  }

  ?>