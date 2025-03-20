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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin DashBoard</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
   <header class="header">
 <a href="">Admin Dashboard</a>
 <div class="logout">
  <a href="logout.php" class="btn btn-warning">Logout</a>
 </div>

</header>


<aside>
  <ul>
    <li><a href="display.php">Admission</a></li>
    <li><a href="add_student.php">Add Student</a></li>
    <li><a href="">View Student</a></li>
    <li><a href="">Add Teacher</a></li>
    <li><a href="">View Teacher</a></li>
    <li><a href="">Add Courses</a></li>
    <li><a href="">View Courses</a></li>
  </ul>
</aside>



<div class="content">
  <h1>Side Bar</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, odit id! Minus voluptates autem alias dolorem nostrum mollitia aliquam soluta optio architecto sapiente? Laborum non, illum voluptatum magni optio, voluptatem ab quae praesentium modi consectetur explicabo. Reiciendis, labore vel ipsam perferendis consequuntur sed similique minima.</p>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
