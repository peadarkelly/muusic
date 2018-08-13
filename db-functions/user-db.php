<?php
  include_once('utils-db.php');

  function getUser($email, $password) {
    $conn = connectDb();

    $query = "select * from users where email = '". $conn->real_escape_string($email) . "' and password = sha1('" . $conn->real_escape_string($password) . "')";
    $result = $conn->query($query);

    $conn->close();

    if ($result) {
      return $result->fetch_assoc();
    }

    return false;
  }

  function createUser($userForm) {
    $conn = connectDb();

    $conn->close();
  }
?>