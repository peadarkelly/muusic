<?php
  include_once('muusic-functions.php');

  session_start();

  $artists = getArtists();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Artists</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Artists</h1>

      <?php
        displayArtists($artists);
      ?>
    </div>
  </body>
</html>