<?php
session_start();

$expiry = time() - 1;
setcookie("username", '', $expiry);

header('location:login.php');
?>