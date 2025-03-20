<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="" name="submit" method="POST">
      <label for="name">Input Marks:</label>
      <input type="text" name="name" id="name" />
      <input type="submit" value="Calculate" name="submit">
    </form>

    <?php

    
   if(isset($_POST['submit']))
   {
    $marks = $_POST['name'];
    if($marks>60) { echo "Grade is first Division"; } 
    else if($marks>=45 && $marks<60) {
     echo "Grade is Second Division"; 
    } else if($marks>=33 && $marks<45)
    { echo "Grade is Third Division"; 
    } else{
       echo "Sorry Failed Bruda"; 
      }
   }
    ?>


//3fizz 5buzz 3and5 fizzbuzz
    
  </body>
</html>
