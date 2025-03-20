<?php
$date1 =  strtotime("2024-12-15");
$date2 =  strtotime("2024-12-19");

$interval = $date1 - $date2; 

if($interval < 0)
{
  $interval = $interval * -1;
}
$daysDifference = ($interval / 86400 );


echo "The difference between the two dates is $daysDifference days.";
?>
