<?php
namespace core;

$server = "localhost";
$db_user = "root";
$db_pass = "Orangephoenix8!";
$db_name = "to-do-lists";

mysql_connect($server, $db_user, $db_pass) or die("Could not connect to server!");
mysql_select_db($db_name) or die("Could not connect to database!");