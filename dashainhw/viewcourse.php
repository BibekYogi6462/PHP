<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name FROM courses";
$result = mysqli_query($conn, $sql);

echo "<h2>All Courses</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Course ID</th><th>Course Name</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='2'>No courses found</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>
<br><br>

<a href="home.php"><button style="background-color: #4CAF50;">Go to Home</button></a>
