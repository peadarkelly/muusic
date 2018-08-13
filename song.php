<?php
  include_once('muusic-functions.php');

  session_start();

  $songId = $_GET['songId'];

  $song = getSong($songId);
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $song['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1><?php echo $song['title']; ?></h1>

      <?php
        displaySongDetails($song);
      ?>
    </div>
  </body>
</html>