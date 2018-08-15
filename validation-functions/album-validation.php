<?php
  function validateAlbumForm($albumForm) {
    $errors = array();

    if (empty($albumForm['title'])) {
      $errors['title'] = 'Please enter a title for the album';
    }

    if (empty($albumForm['releaseDate'])) {
      $errors['releaseDate'] = 'Please enter a release date for the album';
    }

    if (empty($albumForm['thumbnail'])) {
      $errors['thumbnail'] = 'Please upload a thumbnail for the album';
    }

    return $errors;
  }
?>