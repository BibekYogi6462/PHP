<?php
session_start();

$_SESSION["username"] = "Bibek";
$_SESSION["class"] = "BCA";
echo $_SESSION["username"];
echo $_SESSION["class"];

session_unset();

//This lines cannot be reached
// echo $_SESSION["username"];
// echo $_SESSION["username"];
// echo $_SESSION["username"];
// echo $_SESSION["username"];
// echo $_SESSION["username"];

?>