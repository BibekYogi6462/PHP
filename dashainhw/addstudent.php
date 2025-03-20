<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
</head>
<body>
  <h2>Add Student</h2>

  <form action="" method="POST">
    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" id="student_name" placeholder="Student Name" required>
    <input type="submit" value="Add Student">
  </form>

  <?php
  if (isset($_POST['student_name'])) { 
      $conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
      $sql = "INSERT INTO students (name) VALUES ('$student_name')";
      if (mysqli_query($conn, $sql)) {
          echo "Student added successfully!";
          header("Location: viewstudents.php");
          exit();
      } else {
          echo "Error: " . mysqli_error($conn);
      }

      mysqli_close($conn);
  }
  ?>
</body>
</html>
