<?php
$servername = "localhost";
$username = "root";
$password = "sagar123";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the enrollment ID from the URL
$enrollment_id = $_GET['enrollment_id'];

// Fetch current enrollment details
$sql = "SELECT e.student_id, e.course_id, s.name AS student_name, c.course_name
        FROM enrollments e
        JOIN students s ON e.student_id = s.id
        JOIN courses c ON e.course_id = c.id
        WHERE e.enrollment_id = '$enrollment_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $student_id = $row['student_id'];
    $course_id = $row['course_id'];
    $student_name = $row['student_name'];
    $course_name = $row['course_name'];
} else {
    echo "Enrollment not found!";
    exit;
}

// Fetch all available courses for the dropdown
$courses_sql = "SELECT id, course_name FROM courses";
$courses_result = $conn->query($courses_sql);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_course_id = $_POST['course_id'];

    // Update the course for the enrollment
    $update_sql = "UPDATE enrollments SET course_id = '$new_course_id' WHERE enrollment_id = '$enrollment_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Enrollment updated successfully!";
        header("Location: view_enrollments.php");  // Redirect back to the enrollments page
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Enrollment</title>
</head>
<body>
    <h2>Update Enrollment for <?php echo $student_name; ?></h2>

    <form action="update_enrollment.php?enrollment_id=<?php echo $enrollment_id; ?>" method="POST">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" value="<?php echo $student_name; ?>" readonly><br><br>

        <label for="course_id">Select New Course:</label>
        <select name="course_id" id="course_id" required>
            <?php while ($course = $courses_result->fetch_assoc()): ?>
                <option value="<?php echo $course['id']; ?>" <?php echo ($course_id == $course['id']) ? 'selected' : ''; ?>>
                    <?php echo $course['course_name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit">Update Enrollment</button>
    </form>
</body>
</html>
