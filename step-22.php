
Your First DI Container

<?php

  class first
  {
      public $var1="first class";
      public function getValue()
      {
        return $this->var1;
      }
  }
  class second
  {
      public $var2="";
     function __construct(first $class1)
      {
        echo $class1->getValue();
      }
  }
	$class2 = new second(new first());
	echo $class2->var2;
	 ?>

