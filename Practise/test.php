<?php
//Connect ot the Database
$connection = mysqli_connect('localhost', 'root', '', 'orchid');

//check the connection
if (!$connection) {
    echo "Connection is failed.";
}
//Define and set empty value to each variables
$name = $email = $phone = $password = $cpassword = $gender = $country = "";

//Define and set empty value to the each error variables

$nameError=$emailError=$passwordError=$phoneError=$cpwError=$genderError=$countryError="";

$isValid=true;

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
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) && trim($_POST["phone"] )!=''){
        $phone=$_POST["phone"];

    }else{
        $phoneError="Phone Number is Required";
        $isvalid=false;
    }
    if(isset($_POST["password"]) && !empty($_POST["password"]) && trim($_POST["password"] )!=''){
        $password=$_POST["password"];

    }else{
        $passwordError="Password is Required";
        $isvalid=false;
    }
    if(isset($_POST["cpassword"]) && !empty($_POST["cpassword"]) && trim($_POST["cpassword"] )!=''){
        $cpassword=$_POST["cpassword"];

    }else{
        $cpwError="Confirm password is Required";
        $isvalid=false;
    }
    if($password!=$cpassword){
        $cpwError="Two Passwords does not match";
        $isvalid=false;

    }
    if(isset($_POST["gender"]) && !empty($_POST["gender"])){
        $gender=$_POST["gender"];

    }else{
        $genderError="Please select a Gender";
        $isvalid=false;
    }
    if(isset($_POST["country"]) && !empty($_POST["country"])){
        $country=$_POST["country"];

    }else{
        $countryError="Please select a country";
        $isvalid=false;
    }
    if($isValid){
        //Encrypt password before storing to the database
        $password=md5($password);
        //SQL query to insert data into the database.
    
$insertSql = "INSERT INTO users (name, email, phone, password, gender, country) VALUES ('$name', '$email', '$phone', '$password', '$gender', '$country')";
//Execute query
$insertResult = mysqli_query($connection, $insertSql);
//Show success/fail message
if($insertResult){
    echo "User has been saved successfully";
}
// else{
//     echo "Sorry,User can not be saved.";
// }


        
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form Registration</title>
    <style>
        .error{
            color:#F00;


        }
        th,td{
            padding:10px;

        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
<!-- Name -->
<label for="name">Name: </label>
<input type="text" name="name" id="name" placeholder="Enter Name">
<span class="error" ><?php echo $nameError; ?> </span>
<br><br>

<!-- Email -->
<label for="email">email: </label>
<input type="email" name="email" id="email" placeholder="Enter Email">
<span class="error"><?php echo $emailError; ?> </span>
<br><br>



<!-- Phone -->
<label for="phone">Phone: </label>
<input type="number" name="phone" id="phone" placeholder="Enter Phone">
<span class="error"><?php echo $phoneError; ?> </span>
<br><br>

<!-- Password -->
<label for="password">Password: </label>
<input type="password" name="password" id="password" placeholder="Enter Password">
<span class="error"><?php echo $passwordError; ?> </span>
<br><br>

<!-- Cpassword -->
<label for="cpassword">Password: </label>
<input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password">
<span class="error"><?php echo $cpwError; ?> </span>
<br><br>

<!-- Gender -->
<label for="gender">Gender: </label>
<input type="radio" name="gender" value="male" >Male
<input type="radio" name="gender" value="female" >female
<span class="error"><?php echo $genderError; ?> </span>
<br><br>

<!-- Country -->
<label for="country">Country:</label>
<select name="country" id="country">
    <option value="">Select a Country</option>
    <option value="Nepal">Nepal</option>
    <option value="China">China</option>
    <option value="USA">USA</option>
</select>
<span class="error"><?php echo $countryError; ?> </span>
<br><br>

<!-- Submit & Reset -->
<input type="submit" value="submit" name="submit">
<input type="reset" value="clear">




</form>

<?php
$fetchSql="SELECT * FROM users";

$fetchResult=mysqli_query($connection, $fetchSql);
$users=[];
while($row=mysqli_fetch_array($fetchResult)){
    array_push($users, $row);
}
?>
<br>
<table border="1" style="border-collapse:collapse;">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Country</th>
    <th colspan="2">Action</th>
    
</tr>
<?php foreach($users as $d){ ?> 
<tr>
    <td><?php echo $d["id"]; ?> </td>
    <td><?php echo $d["name"]; ?> </td>
    <td><?php echo $d["email"]; ?> </td>
    <td><?php echo $d["phone"]; ?> </td>
    <td><?php echo $d["gender"]; ?> </td>
    <td><?php echo $d["country"]; ?> </td>
    <td>
        <a href="update-user.php?id=<?php echo $d["id"]; ?>" >
        Edit
    </a>
    </td>
    <td><a href="delete-user.php?id=<?php echo $d["id"] ; ?>" onclick = "return confirm('ARE YOU SURE YOU WANT TO DELETE?')"> 
     Delete</a></td>

</tr>

<?php } ?>

</table>



    
</body>
</html>
<?php
//close the connection
mysqli_close($connection)
?>