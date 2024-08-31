<?php

class ClassConnect extends mysqli 
{
    private $server = 'localhost';
    private $dbusername = 'root';
    private $dbpass = '';
    private $dbname = 'smartkodi';
    public $conn;

  
    private function __construct()
    {
        $this->conn = new mysqli($this->server, $this->dbusername, $this->dbpass, $this->dbname);
        if($this->conn->connect_error){
            die("Connection Failed" . $this->conn->connect_error);
        }
    }
    public function connect()
    {
        return $this->conn;
    }
}