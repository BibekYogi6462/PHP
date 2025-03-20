<?php


class Person{
  public $name;
  public $age;


//Methods (functions)
public function greet()
{
  echo "Hello, my name is ".$this->name." and I am ". $this->age. " years old. ";

}

}
$john = new Person();
$john->name ="John Doe";
$john->age = 35;
$john->greet();




?>