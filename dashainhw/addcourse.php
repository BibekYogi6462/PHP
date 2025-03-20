<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Course</title>
</head>
<body>
  <h2>Add Course</h2>

  <form action="" method="POST">
    <label for="course_name">Course Name:</label>
    <input type="text" name="course_name" id="course_name" placeholder="Course Name" required>
    <input type="submit" value="Add Course">
  </form>

  <?php
  
  if (isset($_POST['course_name'])) { 
      $conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
      $sql = "INSERT INTO courses (name) VALUES ('$course_name')";
      if (mysqli_query($conn, $sql)) {
          echo "Course added successfully!";
          header("Location: viewcourse.php");
          exit();
      } else {
          echo "Error: " . mysqli_error($conn);
      }

      mysqli_close($conn);
  }
  ?>
</body>
</html>
