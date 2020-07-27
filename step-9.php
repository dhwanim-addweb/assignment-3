Conditionals
s9view.php
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
      <li>
          <strong>Selected</strong>:
          <?php
            if($task['Selected'])
            {
              echo "<span> &#9989; </span>";
            }
            else
            {
              echo "<span> &#10060;</</span>";
            }

           ?>
      </li>

  </body>
</html>

s9.php
<?php
  $task=[
    'Title' => 'Calendar Task',
    'Due' => 'This week',
    'Assigned to' => 'Dhwani',
    'Completed' => true,
    'Selected'=>true
];
require('s9view.php');
 ?>

