<?php
  function handleThumbnail($errors, $isThumbnailUploaded) {
    if ($isThumbnailUploaded) {
      echo "  <div class='valid-feedback'>Thumbnail uploaded</div>";
    } else {
      echo "<div class='row'>";
      echo "  <div class='col-md-5'>";

      if ($errors['thumbnail']) {
        echo "  <div class='invalid-feedback'>" . $errors['thumbnail'] . "</div>";
      }

      echo "    <input id='thumbnail' type='file' name='thumbnail' accept='image/*' class='form-control-file'/>";
      echo "    <small class='form-text text-muted'>Please upload an image for the artist</small>";
      echo "  </div>";

      echo "  <div class='col-md-4'>";
      echo "    <input type='submit' name='submit' value='Upload thumbnail' class='btn btn-success'/>";
      echo "  </div>";
      echo "</div>";
    }
  }
?>