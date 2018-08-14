<?php
  $searchTerm = $_GET['search'];
  $searchType = $_GET['search-type'];

  if ($searchType === 'artist') {
    header("Location: http://localhost:8888/muusic/artists.php?search=$searchTerm&search-type=$searchType");
  } else if ($searchType === 'album') {
    header("Location: http://localhost:8888/muusic/albums.php?search=$searchTerm&search-type=$searchType");
  }
?>