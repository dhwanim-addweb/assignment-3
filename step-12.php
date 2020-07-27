Classes 101
s12.php
<?php
 class Task
{
  public $desc;

  public function __construct($desc)
  {
    echo $this->desc=$desc;
  }

}
$tasks=[
'Hello','World'
];

require('s12view.php');
?>
s12view.php

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
    <?php
      foreach ($tasks as $task)
       {
          echo "<li>$task</li>";
      }
     ?>
    </ul>

  </body>
</html>
