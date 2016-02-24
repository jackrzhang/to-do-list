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
}

    


