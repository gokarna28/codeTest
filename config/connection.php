<?php

class DatabaseConnection
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        if ($this->conn->connect_error) {
            die("<h1>Database connection failed: " . $this->conn->connect_error . "</h1>");
        } else {
           //echo "Database connection successfully";
        }
    }


}

