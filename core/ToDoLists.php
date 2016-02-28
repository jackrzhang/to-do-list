<?php

class ToDoLists {

    private $DB;

    // Constructor - handles DB connection
    public function __construct() {
        // MySQL database connection configuration
        $host = "localhost";
        $port = "3306";
        $db_user = "root";
        $db_pass = "Orangephoenix8!";
        $db_name = "to-do-lists";

        $dsn = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db_name;
        $this->DB = new DB($dsn, $db_user, $db_pass);
    }

    private function display_task($task, $date, $time) {
        $bind = [ 
            'task' => $task, 
            'date' => $date,
            'time' => $time
        ];

        $results = $this->DB->run('SELECT * FROM tasks WHERE task=:task AND date=:date AND time=:time LIMIT 1', $bind);

        echo 
        '<li>
            <span>' . $results[0]['task'] . '</span>
            <img id="' . $results[0]['id'] . '" class="delete-button" width="10px" src="images/close.svg" />
        </li>';
    }

    public function display_all_tasks() {
        $results = $this->DB->run('SELECT * FROM tasks ORDER BY date ASC, time ASC');

        if (!isset($results[0])) {
            return false;
        }

        foreach ($results as $task) {
            $task_name = $task['task'];
            $task_date = $task['date'];
            $task_time = $task['time'];

            $this->display_task($task_name, $task_date, $task_time);
        }
    }

    public function add_task($task, $date, $time) {
        $bind = [ 
            'task' => $task, 
            'date' => $date,
            'time' => $time
        ];

        $this->DB->run('INSERT INTO tasks (id, task, date, time) VALUES (NULL, :task, :date, :time)', $bind);
        $this->display_task($task, $date, $time);
    }

    public function delete_task($task_id) {
        $bind = [ 
            'task_id' => $task_id
        ];

        $this->DB->run('DELETE FROM tasks WHERE tasks.id=:task_id', $bind);
    }   
}

    


