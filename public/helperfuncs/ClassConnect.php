<?php 

class NewDbConnect extends PDO
{
    private $server;
    private $dbUsername;
    private $dbPass;
    private $dbName;
    public $connect;

    private function __construct()
    {
        $this->server = $server;
        $this->dbUsername = $dbUsername;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;
        $this->connect = $connect;
    }
    private function PDOConnect()
    {
        try
        {
           $this->connect = new PDO("mysql: host={$this->server}; dbname={$this->dbName}", $this->dbUsername, $this->dbPass);
           $this->connect->setAttribute(PDO :: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
           echo 'Connection Successful';
        }catch(PDOException $e){
            echo "ERROR". "<br>". $e->getMessage();
        }
    }
    public function connect()
    {
        return $this->connect;
    }
}