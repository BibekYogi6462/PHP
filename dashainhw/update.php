<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $enrollment_id = $_GET['id'];

    // Retrieve Garne 
    $sql = "SELECT * FROM enrollment WHERE id = $enrollment_id";
    $result = mysqli_query($conn, $sql);
    $enrollment = mysqli_fetch_assoc($result);

    if (!$enrollment) {
        echo "Enrollment not found.";
        exit();
    }

    // Retrieve 
    $students = mysqli_query($conn, "SELECT id, name FROM students");
    $courses = mysqli_query($conn, "SELECT id, name FROM courses");

    // Display
    echo "<h2>Update Enrollment</h2>";
    echo "<form method='POST' action=''>";
    echo "Student: <select name='student_id'>";
    while ($student = mysqli_fetch_assoc($students)) {
        $selected = ($student['id'] == $enrollment['student_id']) ? 'selected' : '';
        echo "<option value='{$student['id']}' $selected>{$student['name']}</option>";
    }
    echo "</select><br>";

    echo "Course: <select name='course_id'>";
    while ($course = mysqli_fetch_assoc($courses)) {
        $selected = ($course['id'] == $enrollment['course_id']) ? 'selected' : '';
        echo "<option value='{$course['id']}' $selected>{$course['name']}</option>";
    }
    echo "</select><br>";

    echo "<input type='submit' name='update' value='Update Enrollment'>";
    echo "</form>";
}

// Handle
if (isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    // Update 
    $sql = "UPDATE enrollment SET student_id = $student_id, course_id = $course_id WHERE id = $enrollment_id";
    if (mysqli_query($conn, $sql)) {
        echo "Enrollment updated successfully.";
        header("Location: view.php"); 
        exit();
    } else {
        echo "Error updating enrollment: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
