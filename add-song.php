<?php
  include_once('muusic-functions.php');

  session_start();

  $albums = getAlbumsWithArtistInfo();

  $songErrors = array();

  if (isset($_POST['submit'])) {
    $songForm = array(
      'title' => $_POST['title'],
      'spotifyLink' => $_POST['spotify-link'],
      'albumId' => $_POST['album-id']
    );

    $songErrors = validateSongForm($songForm);

    if (count($songErrors) === 0) {
      $album = getAlbum($_POST['album-id']);
      createSong($songForm, $album);
      header("Location: http://localhost:8888/muusic/admin.php");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add an song</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/admin.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 details-panel">
        <div class="container">
          <h1 class="muusic mini-muusic">MUUSIC</h1>
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
          <h1>Administration - Add an song</h1>
          <hr class='thick'/>

          <?php
            displayCreateSongForm($songErrors, $albums);
          ?>
        </div>
      </div>
    </div>
  </body>
</html>