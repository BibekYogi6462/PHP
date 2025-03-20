<?php

class Person{
  public $name;
  public $age;

 public function __construct($name, $age)
 {
  $this->name = $name;
  $this->age = $age;
 }
 public function greet()
 {
  echo "Hello, my name is ". $this->name . " and I am " .$this->age . " years old";
 }

}
class Employee extends Person {
  public $salary;

  public function __construct($name, $age, $salary)
  {
    parent:: __construct($name, $age);
    $this->salary = $salary;
  }

  public function displayInfo()
  {
    echo "Name: ".$this->name. ", Age: ", $this->age.", Salary: ". $this->salary;
  }
 }

 $employee = new Employee("John Doe", 35, 50000);
 $employee->displayInfo();
 


?>