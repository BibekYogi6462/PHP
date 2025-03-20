<?php
function divide($num1,$num2)
{
  if($num2==0)
  {
    throw new Exception("Division by zero is not allowed");
  }
  return $num1/$num2;
}

try{
  echo divide(10,2)."<br>";
  echo divide(10,0);
}catch(Exception $e){
  echo " Caught Exception: ".$e->getMessage();
}finally{
  echo " End of the operation<br>";
}

?>