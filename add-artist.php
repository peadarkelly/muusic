<?php
  include_once('muusic-functions.php');

  session_start();

  $thumbnail = $_GET['uploaded-thumbnail'];

  $artistErrors = array();

  if (isset($_POST['submit'])) {
    $artistForm = array(
      'name' => $_POST['artist-name'],
      'thumbnail' => $_POST['thumbnail']
    );

    $artistErrors = validateArtistForm($artistForm);

    if (count($artistErrors) === 0) {
      createArtist($artistForm);
      header("Location: http://localhost:8888/muusic/admin.php");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add an artist</title>
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
          <h1>Administration - Add an artist</h1>
          <hr class='thick'/>

          <?php
            displayCreateArtistForm($artistErrors, $thumbnail);
          ?>
        </div>
      </div>
    </div>
  </body>
</html>