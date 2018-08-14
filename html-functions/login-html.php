<?php
  function displayLoginForm($errors) {
    $inputClass = '';

    echo "<h1 class='col-md-12'>SIGN IN</h1>";

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "' class='col-md-4'>";
    echo "  <div class='form-group'>";

    if ($errors['invalid']) {
      echo "  <div class='invalid-feedback'>" . $errors['invalid'] . "</div>";
    }

    echo "    <input id='email' type='text' name='email' class='form-control' placeholder='EMAIL'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <input id='password' type='password' name='password' class='form-control' placeholder='PASSWORD'/>";
    echo "  </div>";

    echo "  <input type='submit' name='submit' value='SUBMIT' class='btn btn-success btn-lg btn-block'/>";
    echo "</form>";
  }
?>