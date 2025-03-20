

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
<?php
include 'connection.php';
session_start();

if (isset($_COOKIE['username'])) {
    header('location: welcome.php');
    exit();
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $check_option = isset($_POST["check"]) ? 1 : 0;

    $fetchSql = "SELECT * FROM students WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $fetchSql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($check_option) {
            $expiry = time() + (86400 * 30); // 30 days
            setcookie("username", $row['name'], $expiry);
        } else {
            setcookie("username", $row['name'], 0); // 0 makes it a session cookie
        }

        // Redirect to welcome page on successful login
        header('location: welcome.php');
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid username or password</p>";
    }
}
?>
