<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filters (if any)
$student_filter = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$course_filter = isset($_GET['course_id']) ? $_GET['course_id'] : '';

// Build the SQL query with optional filters
$sql = "SELECT e.id, s.name AS student_name, c.course_name, e.enrolled_at
        FROM enrollment e
        JOIN students s ON e.student_id = s.id
        JOIN courses c ON e.course_id = c.id
        WHERE 1"; // '1' is always true, so we can conditionally add filters

if ($student_filter) {
    $sql .= " AND e.student_id = '$student_filter'";
}
if ($course_filter) {
    $sql .= " AND e.course_id = '$course_filter'";
}

$sql = " ORDER BY e.enrolled_at DESC";  // Order by enrollment date

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Filtered Enrollments</h2>";
    echo "<table border='1'>
            <tr>
                <th>Enrollment ID</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Enrolled At</th>
                <th>Actions</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["enrollment_id"] . "</td>
                <td>" . $row["student_name"] . "</td>
                <td>" . $row["course_name"] . "</td>
                <td>" . $row["enrolled_at"] . "</td>
                <td>
                    <a href='update_enrollment.php?enrollment_id=" . $row["enrollment_id"] . "'>Update</a> | 
                    <a href='delete_enrollment.php?enrollment_id=" . $row["enrollment_id"] . "' onclick='return confirm(\"Are you sure you want to delete this enrollment?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No enrollments found.";
}

$conn->close();
?>
