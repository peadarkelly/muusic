<?php
  function displaySongs($songs) {
    echo "<table class='table song-table'>";
    echo "  <tbody>";
    echo "    <col width='10%'>";
    echo "    <col width='70%'>";
    echo "    <col width='20%'>";

    foreach ($songs as $song) {
      $spotifyLink = $song['spotify_link'];
      $title = $song['title'];
      $thumbnail = __IMAGES__ . $song['thumbnail'];
      $spotifyButton = __IMAGES__ . 'spotify.png';

      echo "    <tr>";
      echo "      <td><img src='$thumbnail' class='mini-img'/></td>";
      echo "      <td>$title</td>";
      echo "      <td><a href='$spotifyLink'><img src='$spotifyButton' class='mini-img spotify'/>Listen</a></td>";
      echo "    </tr>";
    }

    echo "  </tbody>";
    echo "</table>";
  }

  function displaySongDetails($song) {
    $title = $song['title'];
    $thumbnail = __IMAGES__ . $song['thumbnail'];

    echo "<div class='row'>";
    echo "  <div class='col-md-12'>";
    echo "    <p>$title</p>";
    echo "  </div>";
    echo "  <img src='$thumbnail' class='col-md-12'/>";
    echo "</div>";
  }

  function displayCreateSongForm($errors, $albums) {
    $titleClass = '';
    $spotifyLinkClass = '';

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
    echo "  <div class='form-group'>";
    echo "    <label for='title'>Song title</label>";

    if ($errors['title']) {
      $titleClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['title'] . "</div>";
    }

    echo "    <input id='title' type='text' name='title' class='form-control $titleClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='spotify-link'>Spotify link</label>";

    if ($errors['spotifyLink']) {
      $releaseDateClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['spotifyLink'] . "</div>";
    }

    echo "    <input id='spotify-link' type='text' name='spotify-link' class='form-control $spotifyLinkClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='album-id'>Album</label>";
    echo "    <select name='album-id' class='form-control'/>";

    foreach ($albums as $album) {
      echo "    <option value='" . $album['album_id'] . "'>" . $album['name'] . " - " . $album['title'] . "</option>";
    }

    echo "    </select>";
    echo "  </div>";

    echo "  <input type='submit' name='submit' value='Create song' class='btn btn-success btn-lg btn-block'/>";
    echo "</form>";
  }
?>