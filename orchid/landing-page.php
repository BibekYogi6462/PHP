<?php

session_start();

if (!isset($_COOKIE["remember"])) {
    header("location: login.php");
}

?>

<h1>welcome </h1>