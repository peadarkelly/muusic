<?php
  function validateArtistForm($artistForm) {
    $errors = array();

    if (empty($artistForm['name'])) {
      $errors['name'] = 'Please enter a name for the artist';
    }

    if (empty($artistForm['thumbnail'])) {
      $errors['thumbnail'] = 'Please upload a thumbnail for the artist';
    }

    return $errors;
  }
?>