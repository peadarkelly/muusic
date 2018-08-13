<?php
  include_once('utils-db.php');

  function getReviewsForAlbum($albumId) {
    $conn = connectDb();

    $query = "select * from reviews r join users u on r.user_id = u.user_id where album_id = $albumId";
    $result = $conn->query($query);

    $conn->close();

    return db_result_to_array($result);
  }

  function createReview($reviewForm) {
    $conn = connectDb();

    $query = "INSERT INTO reviews (rating, title, body, album_id, user_id) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("issii", $reviewForm["rating"], $reviewForm["title"], $reviewForm["body"], $reviewForm["albumId"], $_SESSION['userId']);
    $stmt->execute();
    $stmt->close();

    $conn->close();
  }
?>