<?php
// Define two dates
$date1 = new DateTime("2024-12-01");
$date2 = new DateTime("2024-12-19");

// Calculate the difference
$interval = $date1->diff($date2);

// Get the difference in days
$daysDifference = $interval->days;

echo "The difference between the two dates is $daysDifference days.";
?>
