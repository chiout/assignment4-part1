<?php
if ((isset($_GET['logout'])) && ($_GET['logout']==1)) {
  $_SESSION = array();
  session_destroy();
//  header('Location: {$login_url}', true);
//  die();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <p>
      <form method="POST" action=content1.php>
        <label for="name">Username: </label>
        <input type="text" id="name" name="username">
        <input type="submit" value="Login">
      </form>
    </p>
  </body>
</html>
