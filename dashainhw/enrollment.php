<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enroll Student in Course</title>
</head>
<body>
  <h2>Enrollment Form</h2>

  <form action="" method="POST">
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch Garne
    $studentResult = mysqli_query($conn, "SELECT id, name FROM students");
    echo '<label for="student">Select Student:</label>';
    echo '<select name="student_id" id="student">';
    while ($student = mysqli_fetch_assoc($studentResult)) {
        echo "<option value='{$student['id']}'>{$student['name']}</option>";
    }
    echo '</select>';

    // Fetch courses
    $courseResult = mysqli_query($conn, "SELECT id, name FROM courses");
    echo '<label for="course">Select Course:</label>';
    echo '<select name="course_id" id="course">';
    while ($course = mysqli_fetch_assoc($courseResult)) {
        echo "<option value='{$course['id']}'>{$course['name']}</option>";
    }
    echo '</select>';

    mysqli_close($conn);
    ?>

    <input type="submit" value="Enroll">
  </form>
</body>
</html>








<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['student_id']) && isset($_POST['course_id'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $sql = "INSERT INTO enrollment (student_id, course_id) VALUES ('$student_id', '$course_id')";



    // execute garne ya bata 
    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
