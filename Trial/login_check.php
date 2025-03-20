<?php
session_start(); // Start the session at the beginning

$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // SQL query to select the user based on username and password
    $sql = "SELECT * FROM user WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($connection, $sql);

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Check if a user was found and handle the usertype
    if ($row) {
        // Set session based on usertype
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = $row['usertype'];

        // Redirect based on user type
        if ($row["usertype"] == "student") {
            header("Location: studenthome.php");
        } elseif ($row["usertype"] == "admin") {
            header("Location: adminhome.php");
        } else {
            echo "Invalid user type.";
        }
    } else {
        // Set a session message if login fails
        $_SESSION['loginMessage'] = "Username and password do not match.";
        header("Location: login.php"); // Redirect back to login page
    }
}
?>
