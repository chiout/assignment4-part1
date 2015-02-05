<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
<?php
$minMd = $_GET['min-multiplicand'];
$maxMd = $_GET['max-multiplicand']; 
$minMr = $_GET['min-multiplier'];
$maxMr = $_GET['max-multiplier'];

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

//echo "$flag1";
//echo var_dump($nullArray);

if ($flag1 !== 0) {
  $line = "Missing parameter ";
  foreach ($nullArray as $value) {
    $line .= "$value ";
  }
  echo "<p>$line</p>";
}
// if the parameters do not exist, this will print them out
// if flag1 is greater than 0, then this loop will be called on

$flag2 = 0;
foreach ($values as $key => $value) {
  if ($value/$value === 1) {
    $flag2+=1;
  }
  else {
    echo "$key must be an integer<br>";	
  }
} // foreach loop checks to make sure values are all integers
// flag2 serves as a check that all values are integers

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

if($flag1 === 0 && $flag2 === 4 && $flag3 === 2) {
  echo "<table border = 1>";
  $diffMd = ($maxMd - $minMd) + 1;
  $diffMr = ($maxMr - $minMr) + 1;

  echo "<tr><td></td>"; // set the upper left cell empty
  for ($i=0,$a=$minMr; $i<$diffMr; $i++, $a++) {
    echo "<td>$a</td>";
  }

  for ($j=0,$b=$minMd; $j<$diffMd; $j++,$b++) {
    echo "<tr><td>$b</td>";
    for ($k=0,$c=$minMr; $k<$diffMr; $k++,$c++) {
      $mult = $b*$c;
      echo "<td>$mult</td>";
	}
  }  
}   
echo "</tr></table>";
// loops create the multiplication table
?>
  </body>
</html>
