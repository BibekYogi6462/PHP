<?php 
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP crud operation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype = "multipart/form-data">
    <div class="title">Registration form</div>
    <div class="form">
    <div class="input_field"  >
    <label for="">Image:</label>
    <input type="file" name="uploadfile" id="" style="width:100%;"><br><br>
</div>

        <div class="input_field">
            
            <label for="">First Name</label>
            <input type="text" name="fname" id="" class="input" required >
        </div>
        <div class="input_field">
            <label for="">Last Name</label>
            <input type="text" name="lname" id="" class="input" required>
        </div>
        <div class="input_field">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="input" required >
        </div>
        <div class="input_field">
            <label for="">Confirm Password</label>
            <input type="password" name="conpassword" id="" class="input" required>
        </div>
        <div class="input_field">
            <label for="">Gender</label>
            <div class="custom_select">
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
</div>
        </div>
        <div class="input_field">
            <label for="">Email Address</label>
            <input type="text" name="email" id="" class="input" required>
        </div>
        <div class="input_field">
            <label for="Phone">Phone Number</label>
            <input type="number" name="phone" id="" class="input" required>
        </div>
        <div class="input_field" >
            <label for="Favourite">Favourite</label>
            <input type="radio" required name="r1" value="Food"><label for="">Food</label>
            <input type="radio" required name="r1" value="Ride"><label for="">Ride</label>
            <input type="radio" required name="r1" value="Adventure"><label for="">Adventure</label>
        </div>

        <div class="input_field">
            <label for="Address">Address</label>
<textarea name="address" id="" cols="30" rows="10" class="textarea" required></textarea>
        </div>
      

        <div class="input_field">
            <input type="submit" name="register" value="Register" class="btn" >
        </div>
    </div>
</form>
</div>

</body>
</html>


<?php
include("connection.php");
error_reporting(0);

if (isset($_POST['register'])) {
    // Handling the uploaded image
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;
    
    // Moving the uploaded file to the images folder
    if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }

    // Collecting form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $favourite = $_POST['r1'];

    // Check if all fields are filled
    if ($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email != "" && $address != "" && $favourite != "") {
        
        // Insert data into the database
        $query = "INSERT INTO form (std_image, fname, lname, password, cpassword, gender, email, phone, favourite, address) 
                  VALUES('$folder', '$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$favourite', '$address')";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Data inserted into Database";
            header('location:display.php');
        } else {
            echo "Failed to insert data: " . mysqli_error($connection);
        }
    } else {
        echo "Please fill the empty fields";
    }
}
?>


