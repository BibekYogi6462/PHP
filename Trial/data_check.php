<?php
  session_start();

$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

 if(isset($_POST['submit']))
 {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  
$sql = "INSERT INTO admission (name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
$result = mysqli_query($connection,$sql);

if ($result) {
  $_SESSION['message'] = "SAVED DATA"; // Set the session message
  header("Location: ml.php");
  exit(); // Always use exit after header redirection
} else {
  echo "Error inserting data: " . mysqli_error($connection);
}
 }

?>