<?php
  function displayUserAndSearch() {
    $email = $_SESSION['email'];

    echo "<div class='user-search col-md-10'>";
    echo "  <hr/>";

    echo "  <div class='form-group'>";
    echo "    <input type='text' name='search 'class='form-control' placeholder='Enter name or title' required/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <select name='search-type 'class='form-control'>";
    echo "      <option value='artist'>Artist</option>";
    echo "      <option value='album'>Album</option>";
    echo "      <option value='song'>Song</option>";
    echo "    </select>";
    echo "  </div>";

    echo "  <input type='submit' name='submit' value='Search' class='btn btn-success btn-block'/>";

    echo "  <hr/>";

    echo "  <p>$email - <a href='logout.php'>Logout</a></p>";
    echo "</div>";
  }
?>