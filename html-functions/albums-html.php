<?php
  function displayAlbums($albums) {
    foreach ($albums as $album) {
      $id = $album['album_id'];
      $title = $album['title'];
      $thumbnail = __IMAGES__ . $album['thumbnail'];

      echo "<div class='col-md-6 tile'>";
      echo "  <a href='album.php?albumId=$id'>";
      echo "    <img src='$thumbnail'class='img-fluid'/>";
      echo "    <p>$title</p>";
      echo "  </a>";
      echo "</div>";
    }
  }

  function displayAlbumDetails($album) {
    $title = $album['title'];
    $thumbnail = __IMAGES__ . $album['thumbnail'];

    echo "<h2>$title</h2>";
    echo "<img src='$thumbnail' class='img-fluid'/>";
  }
?>