<?php
session_start(); // Start the session
error_reporting(0); // Turn off error reporting

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>"; // Display alert
    unset($_SESSION['message']); // Clear the session message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

</head>
<body>
    <nav>
      <label for="" class="logo">W-School</label>

      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Admission</a></li>
        <li><a href="" class="btn btn-success">Login</a></li>
      </ul>
    </nav>

    <div class="section1">
      <!-- <label for="" class="img_text">We Teach Student With Care</label> -->
      <img src="image/banner.jpg" class="main_img" alt="">
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-4">
        <img src="image/about.jpg" class="welcome_img" alt="">
        </div>
        <div class="col-md-8">
           <h1>Welcome to W-School</h1>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis est maiores amet esse, maxime asperiores consequatur tempore iste voluptates mollitia dolor illo, a earum voluptatibus et eum sunt quae, exercitationem eius aliquam eveniet eligendi nobis numquam? Architecto soluta numquam minima ex dolorem quisquam ad eum!</p>
        </div>
      </div>
    </div>


    <center>
      <h1>Our Teacher</h1>

    </center>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="image/team-01.jpg" class="teacher"  alt="">
          <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
        <div class="col-md-4">
        <img src="image/team-02.jpg" class="teacher"  alt="">
        <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
        <div class="col-md-4">
        <img src="image/team-03.jpg"   class="teacher"  alt="">
        <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <img src="image/team-04.jpg" class="teacher"  alt="">
          <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
        <div class="col-md-4">
        <img src="image/team-05.jpg" class="teacher"  alt="">
        <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
        <div class="col-md-4">
        <img src="image/team-06.jpg"   class="teacher"  alt="">
        <p>My name is Ram Bhajan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et at provident necessitatibus ipsam, veniam quidem.</p>
        </div>
      </div>
    </div>


    <center>
      <h1>Our Courses</h1>

    </center>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="image/client-03.png" class="teacher"  alt="">
          <h1>WEB TECH</h1>
        </div>
        <div class="col-md-4">
        <img src="image/client-04.png" class="teacher"  alt="">
       <h1>WEB TECH</h1>
        </div>
        <div class="col-md-4">
        <img src="image/client-08.png"   class="teacher"  alt="">
       <h1>WEB TECH</h1>
        </div>
      </div>
    </div>

    <center>
      <h1 class="adm">Admission Form</h1>

    </center>

    <div align="center" class="admission_form">
      <form action="data_check.php" method="POST">
       <div class="adm_int">
       <label for="" class="label_text">Name</label>
       <input  class="input_deg" type="text" name="name">
       </div>
       <div class="adm_int">
       <label for="" class="label_text">Email</label>
       <input class="input_deg" type="text" name="email">
       </div>
       <div class="adm_int">
       <label for="" class="label_text">Phone</label>
       <input class="input_deg" type="text" name="phone">
       </div>
       <div class="adm_int">
       <label for="" class="label_text">Message</label>
       <textarea name="message" id="" class="input_txt" name="message"></textarea>
       </div>
       <div class="adm_int">
     
       <input id="submit" type="submit" class=" btn btn-primary" value="Submit" name="submit">
       </div>


       <footer>
        <h2 class="footer_txt">All copyright reserved</h2>
       </footer>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>