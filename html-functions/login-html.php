<?php
  function displayLoginForm($errors) {
    $inputClass = '';

    echo "<div class='row'>";

    if (count($errors) > 0) {
      $inputClass = 'is-invalid';

      echo "<div class='alert alert-danger col-md-12' role='alert'>";
      echo "  " . $errors['invalid'];
      echo "</div>";
    }

    echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "' class='col-md-12'>";
    echo "  <div class='form-group'>";
    echo "    <label for='email'>Email</label>";
    echo "    <input id='email' type='text' name='email' class='form-control $inputClass'/>";
    echo "  </div>";

    echo "  <div class='form-group'>";
    echo "    <label for='password'>Password</label>";
    echo "    <input id='password' type='password' name='password' class='form-control $inputClass'/>";
    echo "  </div>";

    echo "  <input type='submit' name='submit' class='btn btn-primary btn-lg btn-block'/>";
    echo "</form>";

    echo "</div>";
  }
?>