 Booleans
 s8view.php
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Associative array</title>
  </head>
  <body>
    <ul>
      <li>
          <strong>Title</strong>: <?= $task['Title']; ?>
      </li>
      <li>
          <strong>Due Date</strong>: <?= $task['Due']; ?>
      </li>
      <li>
          <strong>Assigned To</strong>: <?= $task['Assigned to']; ?>
      </li>
      <li>
          <strong>Completed</strong>: <?= $task['Completed']?'Complete':'Incomplete'; ?>
      </li>


  </body>
</html>
s8.php

<?php
  $task=[
    'Title' => 'Calendar Task',
    'Due' => 'This week',
    'Assigned to' => 'Dhwani',
    'Completed' => true
];
require('s8view.php');
 ?>

