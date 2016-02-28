<?php
require_once('../../core/ToDoLists.php');
require_once('../../core/DB.php');

$task_id = strip_tags($_POST['task_id']);
$tasks = new ToDoLists();
$tasks->delete_task($task_id);
