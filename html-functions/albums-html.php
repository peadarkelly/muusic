<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  use Carbon\Carbon;

  function displayAlbums($albums) {
    foreach ($albums as $album) {
      $id = $album['album_id'];
      $title = $album['title'];
      $thumbnail = __IMAGES__ . $album['thumbnail'];
      $releaseDate = $album['release_date'];

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
    $releaseDate = Carbon::parse($album['release_date'])->toFormattedDateString();

    echo "<h1>$title</h1>";
    echo "<img src='$thumbnail' class='img-fluid'/>";
    echo "<p>Released $releaseDate</p>";
  }
?>