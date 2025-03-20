<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

// Check if the user is an admin, if not redirect to login
if ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit();
}

// Database connection
$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

// Query to get admission data
$sql = "SELECT * FROM admission";
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
    
<?php
include 'admin_sidebar.php';
?>

<center>

<div class="content">
  <h1>Applied Admission</h1>
   <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['message']; ?></td>
            
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
