<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // starts or looks for session
$login_url = "login.php";

if ((isset($_GET['logout'])) && ($_GET['logout']==1)) {
  $_SESSION = array();
  session_destroy();
  header('Location: login.php', true);
  die();
}
// destroys session if logout is called on

if (!isset($_SESSION['username'])) {
//  if session isn't set then the following occurs:
  if (!isset($_POST['username'])) {
    header('Location: login.php', true);
    die(); // if post value is not set, then user gets redirected to login
// this means that the user bypassed the login page
  }
  if (empty($_POST['username'])) {
    echo "A username must be entered. Click <a href=\"$login_url\">here</a> to return to the login screen.";
    $_SESSION = array();
    session_destroy();
    die();
// if the user enters an empty string then the program recognizes this
// program alerts them and then proceeds to destroy the session
  }
  $_SESSION['username'] = $_POST['username'];
// if the post exists and is not an empty string, then the session array value gets set to it
}

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $_SESSION['username'] = ucfirst($_SESSION['username']);
// this capitalizes the first letter of the name

  if (!isset($_SESSION['counts'])) {
    $_SESSION['counts']=0;
  }

  echo "Hello $_SESSION[username] you have visited this page $_SESSION[counts] times before. Click <a href=\"content1.php?logout=1\">here</a> to logout.";
 
  echo "<p>To view more content, click <a href=\"content2.php\">here</a>.</p>";
 
  $_SESSION['counts']++;

}
// if the session array value is set and is not an empty string, the above code executes
