<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT enrollment.id AS enrollment_id, students.id AS student_id, students.name AS student_name, 
        courses.id AS course_id, courses.name AS course_name 
        FROM enrollment
        JOIN students ON enrollment.student_id = students.id 
        JOIN courses ON enrollment.course_id = courses.id";
$result = mysqli_query($conn, $sql);

echo "<h2>Enrollments</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>ID</th><th>Student ID</th><th>Student Name</th><th>Course ID</th><th>Course Name</th><th>Action</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $enrollment_id = $row['enrollment_id'];
    echo "<tr>
            <td>{$row['enrollment_id']}</td>
            <td>{$row['student_id']}</td>
            <td>{$row['student_name']}</td>
            <td>{$row['course_id']}</td>
            <td>{$row['course_name']}</td>
            <td>
                <a href='update.php?id=$enrollment_id'>Update</a> | 
                <a href='#' onclick='confirmDelete($enrollment_id)'>Delete</a>
            </td>
          </tr>";
}

echo "</table>";

mysqli_close($conn);
?>

<script>
function confirmDelete(enrollment_id) {
    // Ask for confirmation
    var confirmDelete = confirm("Are you sure you want to delete this enrollment?");
    
    if (confirmDelete) {
        // Redirect to delete page with enrollment ID as parameter
        window.location.href = "delete.php?id=" + enrollment_id;
    }
}
</script>

<br><br>

<a href="home.php"><button style="background-color: #4CAF50;">Go to Home</button></a>
