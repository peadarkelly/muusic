<?php
  include_once('utils-db.php');

  function getAlbumsForArtist($artistId) {
    $conn = connectDb();

    $query = "select * from albums where artist_id = $artistId";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function getAlbumsWithArtistInfo() {
    $conn = connectDb();

    $query = "select * from albums al join artists ar on al.artist_id = ar.artist_id";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function getAlbum($albumId) {
    $conn = connectDb();

    $query = "select * from albums where album_id = $albumId";
    $result = $conn->query($query);

    $conn->close();

    return $result->fetch_assoc();
  }

  function searchAlbums($searchTerm) {
    $conn = connectDb();

    $query = "select * from albums where title like '%$searchTerm%'";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function createAlbum($albumForm) {
    $conn = connectDb();

    $query = "INSERT INTO albums (title, release_date, thumbnail, artist_id) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdsi", $albumForm["title"], $albumForm["releaseDate"], $albumForm["thumbnail"], $albumForm["artistId"]);
    $stmt->execute();
    $stmt->close();

    $conn->close();
  }
?>