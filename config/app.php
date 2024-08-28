<?php

require_once('config/connection.php');
if (!defined('SERVERNAME')) {
    define('SERVERNAME', 'localhost');
}
if (!defined('USERNAME')) {
    define('USERNAME', 'root');
}
if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}
if (!defined('DBNAME')) {
    define('DBNAME', 'code_test');
}
$db = new DatabaseConnection();


