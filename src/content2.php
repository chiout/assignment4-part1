<?php

session_start();

$filePath = explode('/', $_SERVER['PHP_SELF'],-1);
$filePath = implode('/', $filePath);
$redirect = "http://".$_SERVER['HTTP_HOST'].$filePath;
/*
The three lines of code above are taken from the "PHP Sessions" video for this class
They are from lines 10-12 in the video
URL to video is in content1.php file
*/

$loginUrl = $redirect."/login.php"; // based on line 13 from "PHP Sessions" video
$c1Url = $redirect."/content1.php"; // also based on line 13 from "PHP Sessions" video

if (!isset($_SESSION['username'])) {
  header("Location: $loginUrl", true);
}
// if the user does not login first then the session['username'] is not set
// if it is not set, then content2 redirects back to the login page

echo "<p>Click <a href=\"$c1Url\">here</a> to return.</p>";


