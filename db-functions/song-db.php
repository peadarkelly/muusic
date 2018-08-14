<?php
  include_once('utils-db.php');

  function getSongsForAlbum($albumId) {
    $conn = connectDb();

    $query = "select * from songs where album_id = $albumId";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function createSong($songForm) {
    $conn = connectDb();

    $conn->close();
  }
?>