<?php
  include_once('muusic-functions.php');

  session_start();

  $thumbnail = $_FILES['thumbnail'];

  var_dump($thumbnail);

  $thumbnailName = $thumbnail['name'];
  $tempLocation = $thumbnail['tmp_name'];
  $newLocation = __IMAGES__ . $thumbnailName;

  echo $newLocation;

  move_uploaded_file($tempLocation, $newLocation);

  header("Location: http://localhost:8888/muusic/add-artist.php?uploaded-thumbnail=$thumbnailName");
?>