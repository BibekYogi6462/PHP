<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT id, name FROM students");

echo "<h2>Students</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>ID</th><th>Name</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td></tr>";
}

echo "</table>";

mysqli_close($conn);
?>
<br><br>

<a href="home.php"><button style="background-color: #4CAF50;">Go to Home</button></a>
