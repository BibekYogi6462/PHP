<?php
$conn = mysqli_connect('localhost', 'root', '', 'SchoolDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $enrollment_id = $_GET['id'];

    
    $sql = "DELETE FROM enrollment WHERE id = $enrollment_id";

    if (mysqli_query($conn, $sql)) {
        echo "Enrollment deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);


header("Location: view.php");
exit();
?>
