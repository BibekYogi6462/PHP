<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login if no session is found
    header("location:login.php");
    exit();
}

// Check if the logged-in user is an admin
if ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit();
}

// Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

// Query to fetch all users from the 'user' table
$sql = "SELECT * FROM user WHERE usertype='student'";
$result = mysqli_query($connection, $sql);

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
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
    }
  </style>
</head>
<body>

  <?php include 'admin_sidebar.php'; ?>
<center>
  <div class="content">
    <h1>View Students</h1>
    <table>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>

      <!-- Loop through the result and display each student record -->
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td>
                  <a href="update-student.php?id=<?php echo $row['id']; ?>">Edit</a>
                  <a href="delete-student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
              </td>
          </tr>
      <?php } ?>
    </table>
  </div>
  </center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
