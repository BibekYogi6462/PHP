
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Form</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="form.css" /> -->
  </head>
  <body>
    <div class="container mt-5 ">
      <form action="" method="post" class="shadow p-4 rounded bg-light">
        <h1 class="mb-4 text-center">Student Form</h1>
        
       
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" />
          <span class="text-danger"><?php echo $nameError; ?></span>
        </div>

       
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" />
          <span class="text-danger"><?php echo $emailError; ?></span>
        </div>

       
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="number" name="phone" class="form-control" id="phone" />
          <span class="text-danger"><?php echo $phoneError; ?></span>
        </div>

        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" />
          <span class="text-danger"><?php echo $passwordError; ?></span>
        </div>

      
        <div class="mb-3">
          <label for="faculty" class="form-label">Faculty</label>
          <input type="text" name="faculty" class="form-control" id="faculty" />
          <span class="text-danger"><?php echo $facultyError; ?></span>
        </div>

       
        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label><br />
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="Male" name="gender" id="male" />
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="Female" name="gender" id="female" />
            <label class="form-check-label" for="female">Female</label>
          </div>
          <span class="text-danger"><?php echo $genderError; ?></span>
        </div>

        
        <div class="mb-3">
          <input type="submit" value="Submit" name="submit" class="btn btn-info w-100" />
        </div>
        <div class="mb-3">
          <a href="login.php">Already Registered?</a>
        </div>

      </form>
    </div>

    <!-- Bootstrap JS (optional for interactive components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


     
<?php
     //Connect ot the Database
     $connection = mysqli_connect('localhost', 'root', '', 'scripting');
     
     //check the connection
     if (!$connection) {
         echo "Connection is failed.";
     }
     
     $name = $email = $phone = $password = $faculty = $gender = "";
     $nameError = $emailError =$phoneError = $passwordError = $facultyError = $genderError = "";
     $isValid=true;

if(isset($_POST["submit"])){
    if(isset($_POST["name"]) && !empty($_POST["name"]) && trim($_POST["name"] )!=''){
        $name=$_POST["name"];

    }else{
        $nameError="Username is Required";
        $isValid=false;
    }
    if(isset($_POST["email"]) && !empty($_POST["email"]) && trim($_POST["email"] )!=''){
        $email=$_POST["email"];

    }else{
        $emailError="Email is Required";
        $isValid=false;
    }
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) && trim($_POST["phone"] )!=''){
        $phone=$_POST["phone"];

    }
    else{
        $phoneError="Phone Number is Required";
        $isValid=false;
    }
    if(isset($_POST["password"]) && !empty($_POST["password"])){
        $password=$_POST["password"];

    }else{
        $passwordError="Password is Required";
        $isValid=false;
    }
    if(isset($_POST["faculty"]) && !empty($_POST["faculty"]) && trim($_POST["faculty"] )!=''){
      $faculty=$_POST["faculty"];

  }else{
      $facultyError="Faculty is Required";
      $isValid=false;
  }
  if(isset($_POST["gender"]) && !empty($_POST["gender"])){
    $gender=$_POST["gender"];

}else{
    $genderError="Please select a Gender";
    $isValid=false;
}

if($isValid){
  $password = md5($_POST['password']);
  
$insertSql = "INSERT INTO students (name, email, phone, password, faculty, gender) VALUES ('$name', '$email', '$phone', '$password', '$faculty', '$gender')";

$insertResult = mysqli_query($connection, $insertSql);

if($insertResult){
echo "User has been saved successfully";
}
 else {
  echo "Error: " . mysqli_error($connection);
}
}
}

?>

 
