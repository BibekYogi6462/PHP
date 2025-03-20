<?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'schoolDB');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students
$students_sql = "SELECT id, name FROM students";
$students_result = mysqli_query($conn,$students_sql);

// Fetch courses
$courses_sql = "SELECT id, name FROM courses";
$courses_result = mysqli_query($conn,$courses_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Student</title>
</head>
<body>
    <h2>Enroll Student in a Course</h2>
    <form action="enroll_student.php" method="POST">
        <label for="student_id">Select Student:</label>
        <select name="student_id" id="student_id" required>
            <option value="">--Select Student--</option>
            <?php while ($student = $students_result->fetch_assoc()): ?>
                <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="course_id">Select Course:</label>
        <select name="course_id" id="course_id" required>
            <option value="">--Select Course--</option>
            <?php while ($course = $courses_result->fetch_assoc()): ?>
                <option value="<?php echo $course['id']; ?>"><?php echo $course['name']; ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit">Enroll</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
