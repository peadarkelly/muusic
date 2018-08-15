<?php
  include_once('thumbnail-html.php');

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

  function displayCreateAlbumForm($errors, $thumbnail, $artists) {
    $titleClass = '';
    $releaseDateClass = '';

    echo "<form method='POST' action='upload.php?referer=add-album.php' enctype='multipart/form-data'>";
    echo "  <div class='form-group'>";
    echo "    <label for='thumbnail'>Album thumbnail</label>";

    handleThumbnail($errors, isset($thumbnail));

    echo "  </div>";
    echo "</form>";

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
    echo "  <div class='form-group'>";
    echo "    <label for='title'>Album title</label>";

    if ($errors['title']) {
      $titleClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['title'] . "</div>";
    }

    echo "    <input id='title' type='text' name='title' class='form-control $titleClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='title'>Album release date</label>";

    if ($errors['releaseDate']) {
      $releaseDateClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['releaseDate'] . "</div>";
    }

    echo "    <input id='release-date' type='date' name='release-date' class='form-control $releaseDateClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='artist-id'>Artist</label>";
    echo "    <select name='artist-id' class='form-control'/>";

    foreach ($artists as $artist) {
      echo "    <option value='" . $artist['artist_id'] . "'>" . $artist['name'] . "</option>";
    }

    echo "    </select>";
    echo "  </div>";

    echo "  <input type='hidden' name='thumbnail' value='$thumbnail'/>";

    echo "  <input type='submit' name='submit' value='Create album' class='btn btn-success btn-lg btn-block'/>";
    echo "</form>";
  }
?>