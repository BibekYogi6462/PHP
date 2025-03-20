<?php
class Car{
public $make;
public $model;
public $year;

public function setYear($year)
{
  $this->year = $year;
}

public function getYear()
{
  return $this->year;
}
}
$myCar = new Car();
$myCar->make = "Toyato";
$myCar->model = "Camry";
$myCar -> setYear(2021);
echo $myCar->getYear();

?>

