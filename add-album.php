<?php
  include_once('muusic-functions.php');

  session_start();

  $thumbnail = $_GET['uploaded-thumbnail'];

  $artists = getArtists();

  $albumErrors = array();

  if (isset($_POST['submit'])) {
    $albumForm = array(
      'title' => $_POST['title'],
      'releaseDate' => $_POST['release-date'],
      'thumbnail' => $_POST['thumbnail'],
      'artistId' => $_POST['artist-id'],
    );

    $albumErrors = validateAlbumForm($albumForm);

    if (count($albumErrors) === 0) {
      createAlbum($albumForm);
      header("Location: http://localhost:8888/muusic/admin.php");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add an album</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/admin.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 details-panel">
        <div class="container">
          <h1 class="mini-muusic">MUUSIC</h1>
          <p>
            <a href="admin.php">Back to admin</a>
          </p>
          <?php
            displayUserAndSearch();
          ?>
        </div>
      </div>

      <div class="col-md-7 content-panel">
        <div class="container">
          <h1>Administration - Add an album</h1>
          <hr class='thick'/>

          <?php
            displayCreateAlbumForm($albumErrors, $thumbnail, $artists);
          ?>
        </div>
      </div>
    </div>
  </body>
</html>