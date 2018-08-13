<?php
  session_start();

  unset($_SESSION['userId']);
  unset($_SESSION['email']);
  unset($_SESSION['isAdmin']);

  session_destroy();

  header("Location: http://localhost:8888/muusic/login.php");
?>