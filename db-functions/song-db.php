<?php
  include_once('utils-db.php');

  function getSongsForAlbum($albumId) {
    $conn = connectDb();

    $query = "select * from songs where album_id = $albumId";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function createSong($songForm, $album) {
    $conn = connectDb();

    $query = "INSERT INTO songs (title, spotify_link, thumbnail, album_id) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $songForm["title"], $songForm["spotifyLink"], $album["thumbnail"], $songForm['albumId']);
    $stmt->execute();
    $stmt->close();

    $conn->close();
  }
?>