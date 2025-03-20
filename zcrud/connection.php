
<?php
// error_reporting(0);
//Connect ot the Database
$connection = mysqli_connect('localhost', 'root', '', 'responsiveform');

 if(!$connection)
 {
  echo "Connection Failed".mysqli_connect_error();
 }
//  else{
//   echo "Connection Success";
//  }
?>


<!-- $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "responsiveform";
 $connection = mysqli_connect($servername,$username,$password,$dbname); -->