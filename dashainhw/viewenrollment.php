<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, student_id, course_id FROM enrollment";
$result = mysqli_query($conn, $sql);

echo "<h2>Enrollment Information</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>ID</th><th>Student ID</th><th>Course ID</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['student_id']}</td><td>{$row['course_id']}</td></tr>";
}

echo "</table>";

mysqli_close($conn);
?>

<br><br>

<a href="home.php"><button style="background-color: #4CAF50;">Go to Home</button></a>
