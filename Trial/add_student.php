<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to login if no session is found
    header("location:login.php");
    exit();
} 

// If the logged-in user is not an admin, redirect them
if ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit();
}

// Database connection
$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $username = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $usertype = "student";

  // Check if username already exists
  $check = "SELECT * FROM user WHERE username = '$username'";
  $check_user = mysqli_query($connection, $check);
  $row_count = mysqli_num_rows($check_user);

  // If username exists, display an error
  if ($row_count == 1) {
    echo "Username Already Exists";
  } else {
    // SQL query to insert a new user
    $sql = "INSERT INTO user(username, phone, email, usertype, password) 
            VALUES ('$username', '$phone', '$email', '$usertype', '$password')";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
      echo "Data Submitted";
    } else {
      echo "Failed: " . mysqli_error($connection);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin DashBoard</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    label {
      display: inline-block;
      text-align: right;
      width: 100px;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .div_deg {
      background-color: skyblue;
      width: 350px;
      padding-top: 70px;
      padding-bottom: 70px;
    }
  </style>
</head>
<body>
    
<?php include 'admin_sidebar.php'; ?>

<center>
<div class="content">
  <h1>Add Students</h1>

  <div class="div_deg">
    <form action="#" method="POST">
    <div>
      <label for="Username">Username</label>
      <input type="text" name="name" required>
    </div>
    <div>
      <label for="Email">Email</label>
      <input type="email" name="email" required>
    </div>
    <div>
      <label for="Phone">Phone</label>
      <input type="number" name="phone" required>
    </div>
    <div>
      <label for="Password">Password</label>
      <input type="password" name="password" required>
    </div>
    <div>
      <input type="submit" name="submit" value="Add Student" class="btn btn-primary">
    </div>
    </form>
  </div>
</div>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
