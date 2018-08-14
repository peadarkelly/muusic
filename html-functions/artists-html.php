<?php
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
    // echo "<p>$bio</p>";
  }
?>