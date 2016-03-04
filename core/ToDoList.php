<?php
require_once('config.php');

class ToDoList {

    private $DB;

    // Constructor - handles DB connection
    public function __construct() {
        // To configure your MySQL database connection, create core/config.php and initialize the global constants, or simply set the variables below.
        $host = DB_HOST;
        $port = DB_PORT;
        $db_user = DB_USER;
        $db_pass = DB_PASS;
        $db_name = "to-do-list";

        $dsn = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db_name;
        $this->DB = new DB($dsn, $db_user, $db_pass);
    }

    // Take in specific task information, run SQL query, and display the task
    private function display_task($task, $date, $time, $checked) {
        $bind = [ 
            'task' => $task, 
            'date' => $date,
            'time' => $time
        ];

        $results = $this->DB->run('SELECT * FROM tasks WHERE task=:task AND date=:date AND time=:time LIMIT 1', $bind);

        if (!isset($results[0])) {
            return false;
        }
        
        echo 
        '<li id="' . $results[0]['id'] . '">
            <span class="task-text';

        if ($checked) {
            echo ' checked';
        }

        echo
           '">' . $results[0]['task'] . '</span>
            <i class="time-button fa fa-clock-o"></i>
            <span class="time-info">'. $results[0]['date'] . ' @ ' . $results[0]['time'] . '</span>
            <i class="delete-button fa fa-trash-o"></i>
            <i class="check-button fa fa-check"></i>
        </li>';
    }

    // Calls display_task for each task in the database
    public function display_all_tasks() {
        $results = $this->DB->run('SELECT * FROM tasks ORDER BY date ASC, time ASC');

        if (!isset($results[0])) {
            return false;
        }

        foreach ($results as $task) {
            $task_name = $task['task'];
            $task_date = $task['date'];
            $task_time = $task['time'];
            $task_checked = $task['checked'];

            $this->display_task($task_name, $task_date, $task_time, $task_checked);
        }
    }

    // Insert task into database, display task in view
    public function add_task($task, $date, $time) {
        $bind = [ 
            'task' => $task, 
            'date' => $date,
            'time' => $time,
        ];

        $this->DB->run('INSERT INTO tasks (id, task, date, time, checked) VALUES (NULL, :task, :date, :time, 0)', $bind);
        $this->display_task($task, $date, $time, 0);
    }

    // Delete task from database
    public function delete_task($task_id) {
        $bind = [ 
            'task_id' => $task_id
        ];

        $this->DB->run('DELETE FROM tasks WHERE tasks.id=:task_id', $bind);
    }   

    // Check/uncheck task by updating the 'checked' column
    public function check_task($task_id) {
        $bind = [ 
            'task_id' => $task_id
        ];

        $results = $this->DB->run('SELECT checked FROM tasks WHERE tasks.id=:task_id LIMIT 1', $bind);

        if (!isset($results[0])) {
            return false;
        }

        if ($results[0]['checked']) { 
            $this->DB->run('UPDATE tasks SET checked=0 WHERE tasks.id=:task_id', $bind);
        } else {
            $this->DB->run('UPDATE tasks SET checked=1 WHERE tasks.id=:task_id', $bind);
        }
    }   
}
