<?php
  function displaySongs($songs) {
    echo "<table class='table song-table'>";
    echo "  <tbody>";
    echo "    <col width='10%'>";
    echo "    <col width='80%'>";
    echo "    <col width='10%'>";

    foreach ($songs as $song) {
      $id = $song['song_id'];
      $title = $song['title'];
      $thumbnail = __IMAGES__ . $song['thumbnail'];

      echo "    <tr>";
      echo "      <td><img src='$thumbnail' class='mini-img'/></td>";
      echo "      <td>$title</td>";
      echo "      <td><a href='song.php?songId=$id'>View</a></td>";
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
?>