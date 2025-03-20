<?php
$connection=mysqli_connect('localhost','root','','scripting');
if(!$connection){
    echo"connection Failed".mysqli_connect_error();
}
?>