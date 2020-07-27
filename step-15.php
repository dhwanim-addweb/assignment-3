Hide Your Secret Passwords

s15.php

	<?php

	$query = require 'bootstrap.php';

	$tasks = $query->selectAll('todos');

	require 's15view.php';
	?>
	
s15view.php


	<!DOCTYPE html>
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
	
bootstrap.php


	<?php

	$config = require 'config.php';
	require 'database/Connection.php';
	require 'database/QueryBuilder.php';

	return new QueryBuilder(
		Connection::make($config['database'])
	);
	?>	
	
config.php


	<?php

	return [
		'database' => [
			'name' => 'laracasts',
			'username' => 'root',
			'password' => '',
			'connection' => 'mysql:host=127.0.0.1',
			'options' => [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			],
		],
	];
		
	?>
	
Connection.php

	<?php

	class Connection
	{
		public static function make($config)
		{
			try {
				
				return new PDO(
				  $config['connection'].';dbname='.$config['name'],
					$config['username'],
					$config['password'],
					$config['options']
				);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}
	}
	?>	
