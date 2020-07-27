 Separate PHP Logic From Presentation
 
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

  </style>
  <body>
    <header>

    <h1><?php echo $greeting;?>
		<br>
        <?php echo $name;?>
	</h1>

    </header>
  </body>
</html>


s5.php

<?php
  $greeting="Hello World";
  $name="My name is Dhwani";
  require('index.view.php');

 ?>
