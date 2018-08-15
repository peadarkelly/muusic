<?php
  function displayReviews($reviews) {
    foreach ($reviews as $review) {
      $title = $review['title'];
      $body = $review['body'];
      $rating = $review['rating'];
      $email = $review['email'];

      echo "<div class='card'>";
      echo "  <div class='card-body'>";
      echo "    <h5 class='card-title'>$rating/10 - $title</h5>";
      echo "    <p class='card-text'>$body</p>";
      echo "    <footer class='blockquote-footer'><cite title='User'>$email</cite></footer>";
      echo "  </div>";

      echo "</div>";
    }
  }

  function displayReviewForm($errors, $albumId) {
    $titleClass = '';
    $bodyClass = '';

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "?albumId=$albumId'>";
    echo "  <div class='form-group'>";
    echo "    <label for='rating'>Rating</label>";
    echo "    <select id='rating' name='rating' class='form-control'>";

    for ($i = 1; $i <= 10; $i++) {
      echo "     <option>$i</option>";
    }

    echo "    </select>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='title'>Title</label>";

    if ($errors['title']) {
      $titleClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['title'] . "</div>";
    }

    echo "    <input id='title' type='text' name='title' class='form-control $titleClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='body'>Body</label>";

    if ($errors['body']) {
      $bodyClass = 'is-invalid';
      echo "  <div class='invalid-feedback'>" . $errors['body'] . "</div>";
    }

    echo "    <textarea rows='2' id='body' type='text' name='body' class='form-control $bodyClass'></textarea>";
    echo "  </div>";

    echo "  <input type='submit' name='submit' value='Submit review' class='btn btn-success btn-lg btn-block'/>";
    echo "</form>";
  }
?>