

<!-- 
LAB1=1-5;
L2=6-11;
L3=12-15; -->
<?php
session_start();

//check if user is already logged in 
if(isset($_SESSION['name'])){
    header("Location:welcome.php");
}

    // cookie

// if(isset($_COOKIE['name'])){
//         header("Location:welcome.php");
//     }
//conect to the database
$connection=mysqli_connect('localhost','root','','scripting');
//check the connection.
if(!$connection){
die('Database connection error');
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fetchSql="SELECT * FROM students where name='$name' AND password='$password'";
    $fetchResult=mysqli_query($connection,$fetchSql);

    if(mysqli_num_rows($fetchResult)==1){
        $row=mysqli_fetch_assoc($fetchResult);
        //store user data in session variables
        $_SESSION['name']=$row['name'];

        // cookie


        // $expiry=time()+(86400+30);//cookie expires in 30days
        // setcookie('name',$row['name'],$expiry);
        header('Location:welcome.php');

    }else{
        echo'login is failed';
        
    }
}
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <fieldset>
                <legend>Student_Login</legend>
                <form action="#" method="POST">
                    <!-- Email -->
<label for="name">Name: </label>
<input type="text" name="name" id="name" placeholder="Enter Name">

<br><br>

<!-- Password -->
<label for="password">Password: </label>
<input type="password" name="password" id="password" placeholder="Enter Password">
<br>
<input type="submit" value="login" name="login" >
<br><br>
<a href="form.php">Not yet registered</a>
<br><br>
            </form>

            </fieldset>

        </body>
        </html>