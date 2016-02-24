<?php
namespace core;

class ToDoLists {
    private $server;
    private $localhost;
    private $db_pass;
    private $db_name;

    public function __construct() {
        $this->server = "localhost";
        $this->db_user = "root";
        $this->db_pass = "Orangephoenix8!";
        $this->db_name = "to-do-lists";
    }

    public function connect() {
        mysql_connect($this->server, $this->db_user, $this->db_pass) or die("Could not connect to server!");
        mysql_select_db($this->db_name) or die("Could not connect to database!");
    }

    public function add_task($task, $date, $time) {
        mysql_query("INSERT INTO `tasks` (`id`, `task`, `date`, `time`) VALUES (NULL, '$task', '$date', '$time');");
    }   

    public function query_task($task, $date, $time) {
        $query = mysql_query("SELECT * FROM tasks WHERE task='$task' AND date='$date' AND time='$time'");

        while ($row = mysql_fetch_assoc($query)) {
            $task_id = $row['id'];
            $task_name = $row['task'];
        }

        print_r($task_name);

        $result = [
            'task_id' => $task_id,
            'task_name' => $task_name
        ];

        return $result;
    }
}

    


