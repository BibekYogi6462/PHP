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

// Fetch the enrollment ID from the URL
$enrollment_id = $_GET['enrollment_id'];

// Delete the enrollment
$delete_sql = "DELETE FROM enrollment WHERE id = '$enrollment_id'";

if ($conn->query($delete_sql) === TRUE) {
    echo "Enrollment deleted successfully!";
    header("Location: view_enrollments.php");  // Redirect back to the enrollments page
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
