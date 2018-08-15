<?php
  session_start();

  if (isset($_SESSION['userId'])) {
    include_once('artists.php');
  } else {
    include_once('login.php');
  }
?>