<?php
require_once('../../core/ToDoList.php');
require_once('../../core/DB.php');

$task_id = strip_tags($_POST['task_id']);
$tasks = new ToDoList();
$tasks->check_task($task_id);