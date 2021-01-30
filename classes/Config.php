<?php


namespace classes;



class Config
{

    protected $mysql;

    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "halit";

        $this->mysqli = new \mysqli($host, $user, $pass, $db);

        // Check connection
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
            exit();
        }
    }
}