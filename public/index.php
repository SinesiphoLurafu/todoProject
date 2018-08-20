<?php
session_start();

require 'function.php';



// echo '$_GET: ';
// print_r($_GET);
// echo '$_POST: ';
// print_r($_POST);

// check if the delete and task is set in the GET / URL
if (isset($_GET['delete']) && isset($_GET['task'])) {
  // Call delete function with task
  delete($_GET['task']);
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
  // Call add function with task
  $task = array ('task'=> $_POST['task'], 'duedate'=>$_POST['duedate']);
  add($task);
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
    <title>TODO App</title>
</head>
<body>
<form action="" method="POST">
<label>Due Date:</label> <input type="date" name='duedate' id="">
  <label>Add Task:</label> <input type="text" name="task">
  <input type="submit" name="submit" id="submit"/>
</form>
<ul>
  <?php
  if (isset($_SESSION['tasks'])) {
    echo 'No of tasks: ' . count($_SESSION['tasks']);
    foreach ($_SESSION['tasks'] as $task) {
  ?>
      <li><?php echo $task['task']; ?> <a href="index.php?delete=1&task=<?php echo $task['task']; ?><?php echo $task['duedate']; ?>">delete</a> 
      <a href="index.php?edit=1&task=<?php echo  $task;?>">edit</a></li>
  <?php
    }
  } ?>
</ul>
</body>
</html>