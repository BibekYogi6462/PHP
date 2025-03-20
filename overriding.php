<?php
 class ParentClass{
  public function display()
  {
    echo "This is the parent class method\n";
  }
  public function displayparent()
  {
    echo "This is the parent class method<br>";
  }
 }

 class ChildClass extends ParentClass{
  public function display()
  {
    echo "This is the child class method\n";
  }
 }
 $obj = new ChildClass();
 $obj->displayparent();
 $obj->display();


?>