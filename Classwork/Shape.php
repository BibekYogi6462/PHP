<?php
interface Shape {
    public function getArea();
    }


class Rectangle implements Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}

$rectangle = new Rectangle(5, 5);
echo "Area of Rectangle: " . $rectangle->getArea() . " square units <br>";

$circle = new Circle(9);
echo "Area of Circle: " . $circle->getArea() . " square units\n";
?>
