<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method = "POST">
    <label for="name">Input a number:</label>
    <input type="text" name="num" id="">
    <input type="submit" value="Check" name="submit">
  </form>


  <?php
   if(isset($_POST["submit"]))
   {
    $num = $_POST['num'];
    if($num%3 == 0 && $num%5 == 0)
    {
       echo "FizzBuzz";
   }
   else if($num%3 == 0)
   {
      echo "Fizz";
   }
   else if($num%5 == 0){
      echo "Buzz";
   }
   else{
    echo"HAHAHAH";
   }
  }
?>
</body>
</html>