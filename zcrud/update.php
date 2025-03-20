<?php 
include("connection.php");
session_start();
$id = $_GET['id'];


$userprofile = $_SESSION['email'];
if($userprofile == true)
{

}
else{
    header('location:login.php');
}


$query = "SELECT * FROM form WHERE id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">Update Form</div>
            <div class="form">
                <div class="input_field">
                    <label for="">First Name</label>
                    <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="input" required>
                </div>
                <div class="input_field">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="input" required>
                </div>
                <div class="input_field">
                    <label for="">Password</label>
                    <input type="password" name="password" class="input"   value="<?php echo $row['password']; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Confirm Password</label>
                    <input type="password" name="conpassword" class="input"  value="<?php echo $row['cpassword']; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Gender</label>
                    <div class="custom_select">
                        <select name="gender">
                            <option value="male" <?php if($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label for="">Email Address</label>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="input" required>
                </div>
                <div class="input_field">
                    <label for="Phone">Phone Number</label>
                    <input type="number" name="phone" value="<?php echo $row['phone']; ?>" class="input" required>
                </div>
                <div class="input_field">
                    <label for="Address">Address</label>
                    <textarea name="address" cols="30" rows="10" class="textarea" required><?php echo $row['address']; ?></textarea>
                </div>
                <div class="input_field">
                    <input type="submit" name="update" value="Update" class="btn">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email != "" && $address != "") {
        // Use an UPDATE query to modify the existing record
        $query = "UPDATE form SET fname = '$fname', lname = '$lname', password = '$pwd', cpassword = '$cpwd', gender = '$gender', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Data updated successfully";
            header('location:display.php');
            
        } else {
            echo "Failed to update data";
        }
    } else {
        echo "Please fill all fields";
    }
}
?>
