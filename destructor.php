<?php
 class Example{
  public function __construct()
  {
    echo "Object Created <br>";

  }
  public function __destruct()
  {
    echo "Object Destroyed\n";
  }
 }

 $obj = new Example(); //Output: Object Created
 // Output when script ends: Object destroyed


?>