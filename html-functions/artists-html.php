<?php
  function displayArtists($artists) {
    foreach ($artists as $artist) {
      $id = $artist['artist_id'];
      $name = $artist['name'];
      $thumbnail = __IMAGES__ . $artist['thumbnail'];

      echo "<div class='row'>";
      echo "  <img src='$thumbnail' class='col-md-4'/>";
      echo "  <div class='col-md-8'>";
      echo "    <p>$name</p>";
      echo "    <p><a href='artist.php?artistId=$id'>View Artist</a></p>";
      echo "  </div>";
      echo "</div>";
    }
  }

  function displayArtistDetails($artist) {
    $name = $artist['name'];
    $thumbnail = __IMAGES__ . $artist['thumbnail'];
    $bio = $artist['bio'];

    echo "<h1>$name</h1>";
    echo "<img src='$thumbnail' class='img-fluid'/>";
    echo "<p>$bio</p>";
  }
?>