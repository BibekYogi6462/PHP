<?php
 class Example{
  public static $property = " I am a static property <br>";

  public static function showProperty()
  {
     return self::$property;
  }
 }

 echo Example::$property;
 echo Example::showProperty();



?>