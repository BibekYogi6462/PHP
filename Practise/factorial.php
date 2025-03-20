<?php
  // $fact = 1;
  // for($i = 1;$i<=4;$i++)
  // {
  //   $fact = $fact*$i;

  // }
  // echo($fact);
function arr($n){
  if($n<=1){
    return 1;
  }else{

    return ($n * arr($n -1));
  }
}
echo(arr(3));
?>