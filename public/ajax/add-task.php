<?php 
require_once('../../core/ToDoLists.php');
require_once('../../core/DB.php');

// Set timezone in case it is not configured in php.ini
date_default_timezone_set('America/New_York');

$task = strip_tags( $_POST['task'] );
$date = date('Y-m-d');
$time = date('H:i:s');

$tasks = new ToDoLists();
$tasks->add_task($task, $date, $time);
