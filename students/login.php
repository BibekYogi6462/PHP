<?php

session_start();
if(isset($_SESSION['name']))
{
    header('location:welcome.php');
}

$connection = mysqli_connect('localhost', 'root', '', 'scripting');


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST["submit"])) {
  
        $name = $_POST["name"];
        $password = $_POST["password"];

        
        $password = md5($password);

        // Fetch the user from the database
        $fetchSql = "SELECT * FROM students WHERE name = '$name' AND password = '$password'";
        $fetchResult = mysqli_query($connection, $fetchSql);

        if (mysqli_num_rows($fetchResult) == 1) {
            
            $student = mysqli_fetch_assoc($fetchResult);

          
            $_SESSION['name'] = $student['name'];



            //cookie
            // $expiry = time()+(86400*30);
            // setcookie('name',$student['email'],$expiry]);

      
            header('location: welcome.php');
            exit;
        } else {
            echo "Login failed. Incorrect email or password.";
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container mt-5">
    <form action="" method="post" class="shadow p-4 rounded bg-light">
        <h1 class="mb-4">Login Portal</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="name" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" />
        </div>

        <div class="mb-3">
            <input type="submit" value="Login" name="submit" class="btn btn-primary w-100" />
        </div>

    </form>
</div>
</body>
</html>
