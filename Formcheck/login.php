<?php
require 'connection.php';
session_start();

$check = "";

if (isset($_COOKIE['username'])) {
    header('location:landing-page.php');
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_POST["check"])) {
        $check = $_POST["check"];
    }

    $fetchSql = "SELECT * FROM students WHERE name  = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $fetchSql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($check == 1) {
            $expiry = time() + (86400 * 30);
            setcookie("username", $row['name'], $expiry);

        } else {
           $_SESSION['username'] = $row['name'];
          
        }

        header('location: landing-page.php');
    }
    else{
        echo "<p>Invalid username or password.</p>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  <fieldset>
    <form action="" method="POST">
      <h3>Student Login</h3>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
      
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
      
      
        <input type="checkbox" name="check" id="check" value="1">
        <label for="check" class="check-label">Check</label>
      
      
      <input type="submit" value="Login" name="login">
    </form>
  </fieldset>
</body>
</html>