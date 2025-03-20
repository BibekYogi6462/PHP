<?php
class Animal{
  public function sound()
  {
    return "Some generic sound";
  }
}

class Dog extends Animal{
  public function sound()
  {
    return "Bark<br>";
  }
}

class Cat extends Animal{
  public function sound()
  {
    return "Meow";
  }
}
function makeSound(Animal $animal)
{
  echo $animal -> sound();
}

$dog = new Dog();
$cat = new Cat();

makeSound($dog);
makeSound($cat);

?>

