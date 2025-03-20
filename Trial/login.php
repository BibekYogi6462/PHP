<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="body_deg" background="image/bg-g1.webp">
    <center>
      <div class="form_deg">
        <center class="title_deg">
          Login Form

          <h4>
            <?php
              error_reporting(0);
              session_start(); // Start the session
              echo $_SESSION['loginMessage']; // Display any login message if exists
              session_unset(); // Clear the session message after displaying
            ?>
          </h4>
        </center>
        <form action="login_check.php" class="login_form" method="POST">

        <div>
          <label for="" class="label_deg">Username</label>
          <input type="text" name="username" id="" required>
        </div>
        <div>
          <label for="" class="label_deg">Password</label>
          <input type="password" name="password" id="" required>
        </div>
        <div>
          <input type="submit" name="submit" id="" value="submit" class="btn btn-warning">
        </div>
        </form>
      </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
