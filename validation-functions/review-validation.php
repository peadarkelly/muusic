<?php
  function validateReviewForm($reviewForm) {
    $errors = array();

    if (empty($reviewForm['title'])) {
      $errors['title'] = 'Please add a title to your review.';
    }

    if (empty($reviewForm['body'])) {
      $errors['body'] = 'Please add some accompanying text for your review explaining your chosen rating.';
    }

    return $errors;
  }
?>