<?php
$connection = mysqli_connect('localhost', 'root', '', 'scripting');

if (!$connection) {
    echo "Connection is failed.";
}
$Id=$_GET['id'];

//sql query to delete a user
$deleteSql="DELETE FROM students WHERE id='$Id'";

//execute query
$deleteResult=mysqli_query($connection, $deleteSql);

//show success/fail message.
if($deleteResult){
    echo "user has been deleted successfull.";
    header("location:display.php");
}
else{
    echo("Sorry,user can not be deleted.");
}

?>