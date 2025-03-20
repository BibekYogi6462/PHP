<?php
// Start the session
session_start();


if (!isset($_SESSION['name'])) {
    header("location: login.php");

}
?>
<!-- if(!isset($_COOKIE['name']))
{
    header('location: login.php')
} -->

<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
<p>You are now logged in with the name: <?php echo $_SESSION['name']; ?></p>
<a href="logout.php" class="btn btn-danger">Logout</a>