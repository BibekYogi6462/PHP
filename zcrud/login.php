<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="loginstyle.css">
  <title>Login</title>
</head>
<body>
   <div class="center">
    <h1>Login</h1>

    <form action="#" method="POST">
    <div class="form">
      <input type="email" name="email" id="" class="textfield" placeholder="Email">
      <input type="password" name="password" id="" class="textfield" placeholder="Password">
      <div class="forgetpass">
        <a href="#" class="link forgetpass" onclick="message()">Forget Password?</a>
        <input type="submit" value="Login" name="login" class="btn">
        <div class="signup">
          New Member? <a href="#" class="link">Signup here</a>
        </div>
      </div>


    </div>
   </div>
   </form>


<script>
function message()
{
  alert("Why the hell you forgot bro?");
}
</script>

</body>
</html>



<?php

  include("connection.php");

  if(isset($_POST['login']))
    {
    $email =   $_POST['email'];
    $password =   $_POST['password'];

    $query ="SELECT * FROM form WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($connection,$query);

   $total = mysqli_num_rows($result);

   if($total == 1)
   {
    // echo "Login Success";
    $_SESSION['email'] =  $email;
    
    header('location: display.php');

   }
   else{
    echo "Not Valid Email and Password";
   }

    }

?>
