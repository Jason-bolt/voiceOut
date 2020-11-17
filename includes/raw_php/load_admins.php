<?php
  include('../db/db.php');
  include('../functions/functions.php');
  
  $commanders = get_commanders();
  $commander = mysqli_fetch_all($commanders, MYSQLI_ASSOC);
  echo json_encode($commander);

  ?>