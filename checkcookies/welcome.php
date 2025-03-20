<?php
session_start();

// Redirect to login page if neither 'username' cookie nor session is set
if (!isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Display welcome message using cookie or session
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : $_SESSION['username'];
echo "<h2>Hello, " . htmlspecialchars($username) . "</h2>";
?>

<form action="" method="POST">
    <input type="submit" name="logout" value="Logout">
</form>

<?php
if (isset($_POST['logout'])) {
    // Destroy the session and unset the username cookie
    session_destroy();
    setcookie('username', '', time() - 3600); // Expire the cookie

    // Redirect to login page after logout
    header('Location: login.php');
    exit();
}
?>
