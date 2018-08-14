<?php
  include_once('muusic-functions.php');

  session_start();

  if(isset($_POST['submit'])) {
    $loginForm = array(
      "email" => $_POST['email'],
      "password" => $_POST['password']
    );

    $loginErrors = validateLoginForm($loginForm);

    if (count($loginErrors) === 0) {
      $user = getUser($loginForm['email'], $loginForm['password']);

      if (!$user) {
        $loginErrors['invalid'] = 'No user found matching the credentials supplied';
      } else {
        $_SESSION['userId'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['isAdmin'] = ((int) $user['role_id']) === 1;

        header("Location: http://localhost:8888/muusic/artists.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/app.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/login.css">
  </head>
  <body>
    <div class="login-page">
      <h1 class="muusic">MUUSIC</h1>
      <div class="row justify-content-md-center login-form">
        <?php
          displayLoginForm($loginErrors);
        ?>
      </div>
    </div>
  </body>
</html>