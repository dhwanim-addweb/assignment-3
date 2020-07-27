Understanding Arrays

index.view.php

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP and HTML</title>
  </head>
  <style>
    header
    {
      background-color: yellow;
      padding:2em;
      text-align:center;
    }
  ul{
    text-align: center;
 list-style: inside;
  }
  </style>
  <body>
    <header>

    <h1>
      <ul>
      <?php
        foreach ($animals as $animal) {
            echo "<li>$animal</li>";
        }
       ?>
     </ul>
    </h1>

    </header>
  </body>
</html>

s6.php

<?php
  $animals=['Lion','Tiger','Cat','Rabbit','Fox'];
  require('index.view.php');

 ?>
