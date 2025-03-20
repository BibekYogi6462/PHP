<?php
class Product {
    public $name;
    public $price;
    public $category;

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Category: " . $this->category . "<br>";
    }
}

// Create an instance of the Product class
$apple = new Product();
$apple->name = "Apple";
$apple->price = 1500;
$apple->category = "Fruit";

// Call the displayInfo method
$apple->displayInfo();
?>
