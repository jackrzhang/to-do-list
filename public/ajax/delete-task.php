<?php
require_once('../../core/ToDoLists.php');

$task_id = strip_tags($_POST['task_id']);
$tasks = new \core\ToDoLists();
$tasks->connect();
$tasks->delete_task($task_id);
$tasks->close();