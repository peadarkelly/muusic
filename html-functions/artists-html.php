<?php
  include_once('thumbnail-html.php');

  function displayArtists($artists) {
    foreach ($artists as $artist) {
      $id = $artist['artist_id'];
      $name = $artist['name'];
      $thumbnail = __IMAGES__ . $artist['thumbnail'];

      echo "<div class='col-md-6 tile'>";
      echo "  <a href='artist.php?artistId=$id'>";
      echo "    <img src='$thumbnail'class='img-fluid'/>";
      echo "    <p>$name</p>";
      echo "  </a>";
      echo "</div>";
    }
  }

  function displayArtistDetails($artist) {
    $name = $artist['name'];
    $thumbnail = __IMAGES__ . $artist['thumbnail'];
    $bio = $artist['bio'];

    echo "<h2>$name</h2>";
    echo "<img src='$thumbnail' class='img-fluid'/>";
  }

  function displayCreateArtistForm($errors, $thumbnail) {
    $nameClass = '';

    echo "<form method='POST' action='upload.php?referer=add-artist.php' enctype='multipart/form-data'>";
    echo "  <div class='form-group'>";
    echo "    <label for='thumbnail'>Artist thumbnail</label>";

    handleThumbnail($errors, isset($thumbnail));

    echo "  </div>";
    echo "</form>";

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
    echo "  <div class='form-group'>";
    echo "    <label for='artist-name'>Artist name</label>";

    if ($errors['name']) {
      $nameClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['name'] . "</div>";
    }

    echo "    <input id='artist-name' type='text' name='artist-name' class='form-control $nameClass'/>";
    echo "  </div>";

    echo "  <input type='hidden' name='thumbnail' value='$thumbnail'/>";

    echo "  <input type='submit' name='submit' value='Create artist' class='btn btn-success btn-lg btn-block'/>";
    echo "</form>";
  }
?>