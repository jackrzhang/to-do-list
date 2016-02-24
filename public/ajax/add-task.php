<?php 
require_once('../../core/ToDoLists.php');

// Set timezone in case it is not configured in php.ini
date_default_timezone_set('America/New_York');

$task = strip_tags( $_POST['task'] );
$date = date('Y-m-d'); // Today%u2019s date
$time = date('H:i:s'); // Current time

$tasks = new \core\ToDoLists();
$tasks->connect();
$tasks->add_task($task, $date, $time);
$result = $tasks->query_task($task, $date, $time);

print_r($result);

mysql_close();

// html response
echo '<li><span>' . $result['task_name'] . '</span><img id="' . $result['task_id'] . '" class="delete-button" width="10px" src="../images/close.svg" /></li>';
?>