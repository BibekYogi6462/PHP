<?php
// Constant in UPPERCASE
define("MAX_USERS", 100); 

// Function in camelCase
function calculateArea($length, $width) {
    // Variable in camelCase
    $area = $length * $width;
    return $area;
}

// Variable in camelCase
$userName = "Bibek";
$userAge = 20;

// Output values
echo "User Name: $userName<br>";
echo "User Age: $userAge<br>";

// Call function and display result
$length = 10;
$width = 5;
$area = calculateArea($length, $width);

echo "Area of rectangle: $area<br>";

?>
