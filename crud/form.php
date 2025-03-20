<?php
$isvalid=true;
$username=$password=$phone=$faculty=$gender="";
$connection = mysqli_connect('localhost', 'root', '', 'scripting');

//check the connection
if (!$connection) {
    echo "Connection is failed.";
}
if(isset($_POST["submit"])){
    if(isset($_POST["name"]) && !empty($_POST["name"]) && trim($_POST["name"] )!=''){
        $name=$_POST["name"];

    }else{
        $nameError="Username is Required";
        $isvalid=false;
    }
    if(isset($_POST["email"]) && !empty($_POST["email"]) && trim($_POST["email"] )!=''){
        $email=$_POST["email"];

    }else{
        $emailError="Email is Required";
        $isvalid=false;
    }
    if(isset($_POST["password"]) && !empty($_POST["password"]) && trim($_POST["password"] )!=''){
        $password=$_POST["password"];

    }else{
        $passwordError="Password is Required";
        $isvalid=false;
    }
    if(isset($_POST["faculty"]) && !empty($_POST["faculty"])!=''){
        $faculty=$_POST["faculty"];

    }else{
        $facultyError="faculty is required";
        $isvalid=false;
    }
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) && trim($_POST["phone"] )!=''){
        $phone=$_POST["phone"];

    }else{
        $phoneError="phones is Required";
        $isvalid=false;
    }
    if(isset($_POST["gender"]) && !empty($_POST["gender"]) !=''){
        $gender=$_POST["gender"];

    }else{
        $genderdError="Gender is Required";
        $isvalid=false;
    }
    if($isvalid){
        $password=md5($_POST["password"]);

        echo"form submitted";
    }else{
        echo "ERROR";
    }
    $insertSql = "INSERT INTO students (name,email,password,faculty,phone,gender) VALUES ('$name', '$email','$password','$faculty','$phone','$gender')";
    //Execute query
    $insertResult = mysqli_query($connection, $insertSql);
    //Show success/fail message
    if(!$insertResult){
        echo "User hasnot been saved successfully";
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

    <fieldset>
        <legend>CRUD form</legend>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
<br><br>
        <label for="phone">Phone:</label>
        <input type="number" name="phone" id="phone" id="phone">
        <br><br>

        <label for="password">Password:</label>
        <input type="text" name="password" id="password" >
        <br><br>

        <label for="faculty">Faculty:</label>
       <select name="faculty" id="faculty">
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="BIT">BIT</option>
        
       </select>
        <br><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="" value="male">Male
        <input type="radio" name="gender" id="" value="female">female
<br>
<br>
<input type="submit" value="register" name="submit">
        
    </fieldset>
    </form>
    
</body>
</html>

<?php
//close the connection
mysqli_close($connection)
?>
