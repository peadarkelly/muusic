<?php
  include_once('muusic-functions.php');

  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
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
            <a href="artists.php">Back to all artists</a>
          </p>
          <?php
            displayUserAndSearch();
          ?>
        </div>
      </div>

      <div class="col-md-7 content-panel">
        <div class="container">
          <h1>Administration</h1>
          <hr class='thick'/>

          <a href="add-artist.php" class="admin-btn">
            <input type='submit' name='submit' value='Add an artist' class='btn btn-success btn-lg btn-block'/>
          </a>
          <a href="add-album.php" class="admin-btn">
            <input type='submit' name='submit' value='Add an album' class='btn btn-success btn-lg btn-block'/>
          </a>
          <a href="add-song.php" class="admin-btn">
            <input type='submit' name='submit' value='Add a song' class='btn btn-success btn-lg btn-block'/>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>