
<?php

class Person{
  public $name;
  public $age;

  public function __construct($name, $age){
    $this->name = $name;
    $this->age = $age;
  }
  public function greet()
  {
    echo "Hello, my name is ".$this->name . " and I am ". $this->age ." years old.";
  }
}

$Bibek = new Person("Bibek Yogi",20);
$Bibek-> greet();


?>