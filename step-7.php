Associative Arrays
view.php
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Associative array</title>
  </head>
  <body>
    <ul>
      <?php foreach ($task as $key => $feature) : ?>

                  <li><strong><?= $key; ?>:</strong> <?= $feature; ?></li>

        <?php endforeach; ?>

  </body>
</html>

s7.php
<?php
  $task=[
    'Title' => 'Calendar Task',
    'Due' => 'This week',
    'Assigned to' => 'Dhwani',
    'Completed' => 'Yes'
];
require('view.php');
 ?>
