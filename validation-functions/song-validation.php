<?php
  function validateSongForm($songForm) {
    $errors = array();

    if (empty($songForm['title'])) {
      $errors['title'] = 'Please enter a title for the song';
    }

    if (empty($songForm['spotifyLink'])) {
      $errors['spotifyLink'] = 'Please provide a Spotify link for the song';
    }

    return $errors;
  }
?>