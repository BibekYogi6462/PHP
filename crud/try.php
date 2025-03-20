<?php
  interface Human{
    public function sleep();
    
  }

  class Bird implements Human{
    public function fly()
    {
      echo "I am flying";
    }
    public function sleep(){
    echo  "I am sleeping";
    }
  }

  class Eagle implements Human
  {
    public function eat()
    {
      echo "I am also eating";
    }
    public function sleep(){
      echo "I am sleeping";
    }
    

  }



  $bird1 = new Eagle();
  $bird1->sleep();
  $bird1->eat();




?>