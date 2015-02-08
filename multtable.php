<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
<?php
/* NOTE: Testing is not conducted via a sample form.
Testing conducted via appending GET values to the URL
*/

$minMd = $_GET['min-multiplicand'];
$maxMd = $_GET['max-multiplicand']; 
$minMr = $_GET['min-multiplier'];
$maxMr = $_GET['max-multiplier'];
// sets variables to each of the parameters

$values = [
  'min-multiplicand' => $minMd, 
  'max-multiplicand' => $maxMd, 
  'min-multiplier' => $minMr, 
  'max-multiplier' => $maxMr]; 
// put the values in an array for easy access

$flag1 = 0;
$nullArray = array();
foreach ($values as $key=>$value) {
  if ($value === NULL) {
    $nullArray[] = $key;
    $flag1+=1;
  }
} // loop checks to make sure all the parameters exist
// if $flag1 = 0, that means all the 4 parameters exist
// if $flag !== 0, then at least one GET value/parameter does not exist
// it checks if any of the values are NULL in the $values array
// it puts the keys with a NULL value in the $nullArray array

//echo "$flag1";
//echo var_dump($nullArray);

if ($flag1 !== 0) {
  $line = "Missing parameter ";
  foreach ($nullArray as $value) {
    $line .= "$value ";
  }
  echo "<p>$line</p>";
}
// if the parameters do not exist, this will print them out from $nullArray
// if flag1 is greater than 0, then this loop will be called on

$flag2 = 0;
foreach ($values as $key => $value) {
  if ($value/$value === 1) {
    $flag2+=1;
  }
  else {
    echo "$key must be an integer<br>";	
  }
} // foreach loop checks to make sure values are all integers and not floating pt
// $flag2 serves as a check that all values are integers
// $flag2 must be 4 if all values are integers
// if $flag2 is not 4, then at least one value was not an integer

$flag3 = 0;
if ($maxMd > $minMd) {
  $flag3+=1;
}
else {
 echo "Minimum multiplicand larger than maximum<br>"; 
}

if ($maxMr > $minMr) {
  $flag3+=1;
}
else {
 echo "Minimum multiplier larger than maximum<br>"; 
}
// this checks to make sure that the mins are all less than the max values
// $flag3 = 2 if both max are greater than their respective min

if($flag1 === 0 && $flag2 === 4 && $flag3 === 2) {
  echo "<table border = 1>";
  $diffMd = ($maxMd - $minMd) + 1;
  $diffMr = ($maxMr - $minMr) + 1;

  echo "<tr><th></th>"; // set the upper left cell empty
  for ($i=0,$a=$minMr; $i<$diffMr; $i++, $a++) {
    echo "<th>$a</th>"; // sets the top row values
  }

  for ($j=0,$b=$minMd; $j<$diffMd; $j++,$b++) {
    echo "<tr><th>$b</th>"; // sets the first column values
    for ($k=0,$c=$minMr; $k<$diffMr; $k++,$c++) {
      $mult = $b*$c;
      echo "<td>$mult</td>"; // sets the mult product values in the table
	}
  }  
}   
echo "</tr></table>";
// loops create the multiplication table
// table will only be created if all three flags are the correct value
?>
  </body>
</html>
