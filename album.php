<?php
  include_once('muusic-functions.php');

  session_start();

  $albumId = $_GET['albumId'];

  if(isset($_POST['submit'])) {
    $reviewForm = array(
      "albumId" => $albumId,
      "rating" => $_POST['rating'],
      "title" => $_POST['title'],
      "body" => $_POST['body']
    );

    $reviewErrors = validateReviewForm($reviewForm);

    if (count($reviewErrors) === 0) {
      createReview($reviewForm);
    }
  }

  $album = getAlbum($albumId);
  $songs = getSongsForAlbum($albumId);
  $reviews = getReviewsForAlbum($albumId);
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $album['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 details-panel">
        <div class="container">
          <p>
            <?php echo "<a href='artist.php?artistId=" . $album['artist_id'] . "'>Back to artist</a>"; ?>
          </p>
          <?php
            displayAlbumDetails($album);
          ?>
        </div>
      </div>

      <div class="col-md-7 content-panel">
        <div class="container">
          <h1>Album Details</h1>
          <hr class='thick'/>

          <h3>Songs</h3>
          <?php
            displaySongs($songs);
          ?>

          <hr/>

          <h3>Reviews</h3>
          <?php
            displayReviews($reviews);
          ?>

          <hr/>

          <h3>Write a review</h3>
          <?php
            displayReviewForm($reviewErrors, $albumId);
          ?>

          <hr/>
        </div>
      </div>
    </div>
  </body>
</html>