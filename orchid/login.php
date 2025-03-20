<?php
require 'connection.php';
session_start();

$remember_me = "";
if (isset($_COOKIE['username'])) {
    header('location:landing-page.php');
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_POST["remember"])) {
        $remember_me = $_POST["remember"];
    }

    $fetchSql = "SELECT * FROM students WHERE name  = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $fetchSql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($remember_me == 1) {
            $expiry = time() + (86400 * 30);
            setcookie("username", $row['username'], $expiry);
            setcookie("remember", $remember_me, $expiry);
        }
        header('location: landing-page.php');
    }
}

?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container">
    <h2 class="text-center">Student Login</h2>
    <div class="form-group">
        <label for="" class="form-label">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="checkbox" id="remember" value="1" name="remember">
        <label for="remember" class="form-label">Remember me</label>
    </div>
    <input type="submit" value="Login" name="submit" class="mt-2 px-3 py-1 bg-success text-white border-0 rounded">
</form>