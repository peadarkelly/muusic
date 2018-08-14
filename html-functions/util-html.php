<?php
  function displayUserAndSearch() {
    $email = $_SESSION['email'];
    $search = '';
    $searchType = 'artist';

    if ($_GET['search']) {
      $search = $_GET['search'];
    }

    if ($_GET['search-type'] === 'album') {
      $searchType = 'album';
    }

    echo "<div class='user-search col-md-10'>";
    echo "  <hr/>";

    echo "  <form action='search.php' method='GET'>";
    echo "    <div class='form-group'>";
    echo "      <input type='text' name='search' class='form-control' value='$search' placeholder='Enter name or title' required/>";
    echo "    </div>";

    echo "    <div class='form-group'>";
    echo "      <select name='search-type' class='form-control' value='$searchType'>";
    echo "        <option value='artist' " . handleDefault('artist') . ">Artist</option>";
    echo "        <option value='album'" . handleDefault('album') . ">Album</option>";
    echo "      </select>";
    echo "    </div>";

    echo "    <input type='submit' name='submit' value='Search' class='btn btn-success btn-block'/>";
    echo "  </form>";

    echo "  <hr/>";

    echo "  <p>$email - " . handleAdmin() . "<a href='logout.php'>Logout</a></p>";
    echo "</div>";
  }

  function handleDefault($option) {
    if ($_GET['search-type'] === $option) {
      return "selected";
    }

    return "";
  }

  function handleAdmin() {
    if ($_SESSION['isAdmin']) {
      return "<a href='admin.php'>Admin</a> | ";
    }

    return "";
  }
?>