<?php
  include_once('muusic-functions.php');

  session_start();

  $albums = searchAlbums($_GET['search']);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Albums</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 details-panel">
        <div class="container">
          <h1 class="muusic mini-muusic">MUUSIC</h1>
          <p>
            <a href="artists.php">Back to all artists</a>
          </p>
          <?php
            displayUserAndSearch();
          ?>
        </div>
      </div>

      <div class="col-md-7 content-panel">
        <div class="container">
          <h1>Albums</h1>
          <hr class='thick'/>

          <div class="row">
            <?php
              displayAlbums($albums);
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>