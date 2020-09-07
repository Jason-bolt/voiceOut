<?php

session_start();
include("../functions/functions.php");

session_unset();

redirect_to("../../login.php");

?>