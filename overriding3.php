<!-- //parent ::  -->
<?php
  class Vehicle{
    public function start()
    {
      echo "Vehicle Started <br>";
    }
  }


  class Car extends Vehicle{
    public function start()
    {
      parent::start();
      echo "Car is ready to drive <br>";
    }
  }

  $car = new Car();
  $car->start();


?>
