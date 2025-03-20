<?php
 class Bird{

  public function fly()
  {
    echo "I can Fly";
  }

}
 class Human extends Bird{
  public function eat()
  {
    echo "I can eat";
  }
  
 }
 
 
 $human = new Human();
 $human->eat();
 $human->fly();

?>