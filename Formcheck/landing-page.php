<?php
require 'connection.php';

session_start();

if (isset($_COOKIE['username'])) {
    ?>
    <h1>Hello, <?php echo $_COOKIE['username'] ?></h1>
    <?php
} else {
    ?>
    <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
    <?php
}
?>
<a href="logout.php"><button>Logout</button></a>