<?php

session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.php', true);
}
// if the user does not login first then the session['username'] is not set
// if it is not set, then content2 redirects back to the login page

//echo "<p>Thank you for checking out this page, $_SESSION['username'].</p>";
echo "<p>Click <a href=\"content1.php\">here</a> to return.</p>";

