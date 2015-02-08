<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
eecs.oregonstate.edu/ecampus-video/player/player.php?id=66
based a lot of my code on the "PHP Sessions" video for this class
I mention below which codes reference the code from the video
*/

session_start(); // starts or looks for session
$filePath = explode('/', $_SERVER['PHP_SELF'],-1);
$filePath = implode('/', $filePath);
$redirect = "http://".$_SERVER['HTTP_HOST'].$filePath;
/*
The three lines of code above are taken from the "PHP Sessions" video for this class
They are from lines 10-12 in the video
*/

$loginUrl = $redirect."/login.php";
$logout = $redirect."/content1.php?logout=1";
$c2Url = $redirect."/content2.php";
// here the variables are set to equal the full URLs
// based on line 13 from "PHP Sessions" video"

if ((isset($_GET['logout'])) && ($_GET['logout']==1)) {
  $_SESSION = array();
  session_destroy();
  header("Location: $loginUrl", true);
  die();
}
/*
destroys session if the GET 'logout' key is given a value of 1
this if block uses the code from lines 8, 9, 13, and 14 from the "PHP Sessions" video
there are some slight modifications I made from the video's code
all code used to end the session in this program uses code from lines 8-9, 14 from the video-
such as the if statement below that checks if $_POST['username'] is an empty string
*/

if (!isset($_SESSION['username'])) {
//  if session isn't set then the following occurs:
  if (!isset($_POST['username'])) {
    header("Location: $loginUrl", true);
    die(); // if post value is not set, then user gets redirected to login
// this means that the user bypassed the login page
  }
  if (empty($_POST['username'])) {
    echo "A username must be entered. Click <a href=\"$loginUrl\">here</a> to return to the login screen.";
    $_SESSION = array();
    session_destroy();
    die();
// if the user enters an empty string then the program recognizes this
// program alerts them and then proceeds to empty the session array and destroy the session
  }
  $_SESSION['username'] = $_POST['username'];
// if the POST key-value pair exists and value is not an empty string, then the session array value gets set to it
}

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  if (!isset($_SESSION['counts'])) {
    $_SESSION['counts']=0;
// this is code from lines 22-23 of the "PHP Sessions" video, but with a different variable
  }

  echo "Hello $_SESSION[username] you have visited this page $_SESSION[counts] times before. Click <a href=\"$logout\">here</a> to logout.";
 
  echo "<p>To view more content, click <a href=\"$c2Url\">here</a>.</p>";
 
  $_SESSION['counts']++; // this is from line 26 of the "PHP Sessions" video

}
// if the session array value is set and is not an empty string, the above code executes
