
<?php  
   interface Area {  
      public function calcArea();  
   }  
   class Circle implements Area {  
      private $radius;  
      public function __construct($radius){  
         $this -> radius = $radius;  
      }  
      public function calcArea(){  
         return $this -> radius * $this -> radius * pi();  
      }  
   }  
   class Rectangle implements Area {  
      private $width;  
      private $height;  
      public function __construct($width, $height){  
         $this -> width = $width;  
         $this -> height = $height;  
      }  
      public function calcArea(){  
         return $this -> width * $this -> height;  
      }  
   }  
   $mycirc = new Circle(3);  
   $myrect = new Rectangle(3,4);  
  echo "the area of circle is ";  
  echo $mycirc->calcArea();  
  echo "<br>";  
  echo "the area of rectangle is ";    
   echo $myrect->calcArea();  
?>   
  
