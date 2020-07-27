Intro to PDO(PHP Data Objects)
s13.php
	<?php

	try {
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=laracasts', 'root', '');
	} catch (PDOException $e) {
		die("Could not connect: $e");
	}


	$query = $pdo->prepare('select * from todos');


	$query->execute();


	$tasks = $query->fetchAll(PDO::FETCH_OBJ);


	
	require('s13view.php');
 ?>

s13view.php

	
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
  <?php foreach ($tasks as $task) : ?>
    <li>
      <?php if ($task->completed) : ?>
        <strike><?= $task->description ?></strike>
      <?php else : ?>
        <?= $task->description ?>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>

  </body>
</html>
