<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Management</title>
  <style>
   .container{
    border: 1px solid black;
    padding: 10px;
   }

    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      text-align: center;
    }
    .container {
      width: 50%;
      margin: 0 auto;
    }
    .menu {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .menu a {
      text-decoration: none;
      padding: 15px;
      margin: 10px;
      background-color: #4CAF50;
      color: white;
      border-radius: 5px;
      width: 50%;
      text-align: center;
      font-size: 18px;
      box-sizing: border-box;
    }
    .menu a:hover {
      background-color: grey;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Course Management System</h1>
    <div class="menu">
      <a href="addcourse.php">Add Course</a>
      <a href="addstudent.php">Add Student</a>
      <a href="enrollment.php">Enroll into course</a>
      <a href="view.php">View Enrollments</a>
      <a href="viewstudents.php">View Students</a>
      <a href="viewcourse.php">View Course</a>
    </div>
  </div>
</body>
</html>
