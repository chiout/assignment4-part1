<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$login_url = "login.php";

if ((isset($_GET['logout'])) && ($_GET['logout']==1)) {
  $_SESSION = array();
  session_destroy();
  header('Location: login.php', true);
  die();
}

if (!isset($_POST['username'])) {
  header('Location: login.php', true);
}
//  if the POST array has no assignment set for username, it will redirect back to the login page
// this is different from having an empty string; redirect will not happen then

if (empty($_POST['username'])) {
  echo "A username must be entered. Click <a href=\"$login_url\">here</a> to return to the login screen.";
}
else {
  $_SESSION['username'] = $_POST['username'];

  if (!isset($_SESSION['counts'])) {
    $_SESSION['counts']=0;
  }

  echo "Hello $_SESSION[username] you have visited this page $_SESSION[counts] times before. Click <a href=\"content1.php?logout=1\">here</a> to logout.";
  
  $_SESSION['counts']++;

}
