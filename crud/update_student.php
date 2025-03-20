<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Edit student details</h1>
<?php
$connection = mysqli_connect("localhost", "root", "", "scripting");
if (!$connection) {
    die(mysqli_error($connection));
}
$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>

<div class="big">
    <div class="he"><h3>Student's record:</h3></div>
    <div class="fom">
        <form action="#" method="POST">
            <fieldset>
                <legend>CRUD form</legend>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" required>
                <br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $row["email"]; ?>" required>
                <br><br>

                <label for="phone">Phone:</label>
                <input type="number" name="phone" id="phone" value="<?php echo $row["phone"]; ?>" required>
                <br><br>

                <label for="password">Password:</label>
                <input type="text" name="password" id="password" value="<?php echo $row["password"]; ?>" required>
                <br><br>

                <label for="faculty">Faculty:</label>
                <select name="faculty" id="faculty" required>
                    <option value="BCA" <?php if ($row["faculty"] == "BCA") echo "selected"; ?>>BCA</option>
                    <option value="BBA" <?php if ($row["faculty"] == "BBA") echo "selected"; ?>>BBA</option>
                    <option value="BIT" <?php if ($row["faculty"] == "BIT") echo "selected"; ?>>BIT</option>
                </select>
                <br><br>

                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" <?php if ($row["gender"] == "male") echo "checked"; ?>>Male
                <input type="radio" name="gender" value="female" <?php if ($row["gender"] == "female") echo "checked"; ?>>Female
                <br><br>

                <input type="submit" value="register" name="submit">
            </fieldset>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];
    $gender = $_POST['gender'];
    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', faculty='$faculty', gender='$gender' WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "Update successfully";
    } else {
        echo "Failed";
    }
}
?>

    
</body>
</html>