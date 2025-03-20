<?php
include ('connection.php');




//  $id = $_GET['id'];
 $query = "DELETE FROM form WHERE id = '$_GET[id]'";
 $result = mysqli_query($connection,$query);
 if($result)
 {
   
   header('location:display.php');
   
 }
 else{
    die (mysqli_error($result));
 }

?>