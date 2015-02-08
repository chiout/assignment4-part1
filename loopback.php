<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
  </head>
  <body>
    <p>Please fill out either of the forms below.<br>Ignore the Results section until you have submitted the form.</p>
    <p>
      <form action="loopback.php" method="GET">
        <label for="names">Name: </label>
        <input type="text" name="name" id="names"><br><br>
        <label for="ages">Age: </label>
        <input type="number" name="age" id="ages"><br><br>
        <label for="pets">Which do you prefer? </label><br>
        <input type="radio" name="pet" id="pets" value="cat"> Cats <br>
        <input type="radio" name="pet" id="pets" value="dog"> Dogs <br><br>
        <input type="submit" value="Submit GET Form">
      </form>
    </p>
    <p>
      <form action="loopback.php" method="POST">
        <label for="names">Name: </label>
        <input type="text" name="name" id="names"><br><br>
        <label for="ages">Age: </label>
        <input type="number" name="age" id="ages"><br><br>
        <label for="pets">Which do you prefer? </label><br>
        <input type="radio" name="pet" id="pets" value="cat"> Cats <br>
        <input type="radio" name="pet" id="pets" value="dog"> Dogs <br><br>
        <input type="submit" value="Submit POST Form">
      </form>
    </p>
<?php
$count=0;
// use $count to keep track of number of values that are null
// if this equals size of array that means all values are null

/*
stackoverflow.com/questions/9230813/distinguish-get-from-post-in-php
used user Esailija's first (and only) line of code: "$_SERVER['REQUEST_METHOD'] === 'POST"
found this post and decided that the code was a good way to differentiate between my get and post forms
*/

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  foreach ($_GET as $key=>$value) {
    if (empty($value)) {
      $_GET[$key] = null;
      $count+=1;
    }
  }
// if the input is an empty string, it is set to null
// count will keep track of number of null values
  echo "<h4>Results:</h4><br>";
  $method = $_SERVER['REQUEST_METHOD'];

  if ((count($_GET)) !== $count) {
    echo "{\"Type\":\"$method\", \"parameters\": ".json_encode($_GET)."}";
  }
// if number of null values equals number of elements in GET array
// then program will output the else statement
// otherwise the json object will be returned
  else {
    echo "{\"Type\":\"$method\", \"parameters\":null}";
  }
}

/*
stackoverflow.com/questions/8238502/convert-post-array-to-json-format
got the code json_encode($_POST) from user Code Magician's post (their only line of code on the page)
applied the code here to convert my GET and POST array to a JSON object
*/

// post works exactly the same way as get
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($_POST as $key=>$value) {
    if (empty($value)) {
      $_POST[$key]=null;
      $count+=1;
    }
  }

  $method = $_SERVER['REQUEST_METHOD'];
  echo "<h4>Results:</h4><br>";
  if ((count($_POST)) !== $count) {
    echo "{\"Type\":\"$method\", \"parameters\": ".json_encode($_POST)."}";
  }
  else {
    echo "{\"Type\":\"$method\", \"parameters\":null}";
  }
}

?>
  </body>
</html>
