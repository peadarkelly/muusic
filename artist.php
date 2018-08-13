<?php
  include_once('muusic-functions.php');

  session_start();

  $artistId = $_GET['artistId'];

  $artist = getArtist($artistId);
  $albums = getAlbumsForArtist($artistId);
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $artist['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-3 details-panel">
        <div class="container">
          <p>
            <a href="artists.php">Back to artists</a>
          </p>
          <?php
            displayArtistDetails($artist);
          ?>
        </div>
      </div>

      <div class="col-md-7 content-panel">
        <div class="container">
          <h1>Albums</h1>
          <hr/>

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