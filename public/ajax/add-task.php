<?php 
$task = strip_tags( $_POST['task'] );
$date = date('Y-m-d'); // Today%u2019s date
$time = date('H:i:s'); // Current time

require_once('../../core/ToDoLists.php');
$tasks = new \core\ToDoLists();
$tasks->connect();

mysql_query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");

$query = mysql_query("SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

while( $row = mysql_fetch_assoc($query) ){
    $task_id = $row['id'];
    $task_name = $row['task'];
}

mysql_close();

// html response
echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="delete-button" width="10px" src="../images/close.svg" /></li>';
?>