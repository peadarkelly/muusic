<?php
  include_once('utils-db.php');

  function getArtists() {
    $conn = connectDb();

    $query = "select * from artists";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function getArtist($artistId) {
    $conn = connectDb();

    $query = "select * from artists where artist_id = $artistId";
    $result = $conn->query($query);

    $conn->close();

    return $result->fetch_assoc();
  }

  function searchArtists($searchTerm) {
    $conn = connectDb();

    $query = "select * from artists where name like '%$searchTerm%'";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function createArtist($artistForm) {
    $conn = connectDb();

    $query = "INSERT INTO artists (name, thumbnail) VALUES (?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $artistForm["name"], $artistForm["thumbnail"]);
    $stmt->execute();
    $stmt->close();

    $conn->close();
  }
?>