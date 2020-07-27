PDO Refactoring and Collaborators

s14.php

	<?php

	$query = require 'bootstrap.php';

	$tasks = $query->selectAll('todos');

	require 's14view.php';
	?>

s14view.php
	
		
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

	require 'database/Connection.php';
	require 'database/QueryBuilder.php';

	return new QueryBuilder(
		Connection::make()
	);
	?>

database/QueryBuilder.php

<?php

class QueryBuilder
{
    protected $pdo;

  
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $query = $this->pdo->prepare("select * from {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

?>
database/Connection.php

<?php

class Connection
{
  
    public static function make()
    {
        try {
            return new PDO('mysql:host=127.0.0.1;dbname=laracasts', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


