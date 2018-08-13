<?php
  function connectDb() {
    // Setup DB connection
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'muusic';

    $db = new mysqli($host, $username, $password, $database);

    if ($db->connect_error) {
      echo "<p>Could not connect to database" . $db->connect_error . "</p>";
      exit();
    }

    return $db;
  }

  function db_result_to_array($result) {
    $res_array = array();

    for ($count=0; $row = $result->fetch_assoc(); $count++) {
      $res_array[$count] = $row;
    }

    return $res_array;
 }
?>