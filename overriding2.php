<?php
class Animal{
 public function sound()
 {
  echo "Animals make sound";
 }
}

 class Dog extends Animal{
  public function sound()
  {
    echo "Dogs Barks";
  }
 }

 $dog = new Dog();
 $dog->sound();

?>