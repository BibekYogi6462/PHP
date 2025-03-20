<?php
 class Employee extends Person {
  public $salary;

  public function __construct($name, $age, $salary)
  {
    parent:: __construct($name, $age);
    $this->salary = $salary;
  }

  public function displayInfo()
  {
    echo "Name: ".$this->name. ", age"
  }
 }
 


?>