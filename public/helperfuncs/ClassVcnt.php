<?php

$conn_path = dirname(__DIR__) . DIRECTORY_SEPARATOR;


define('CONN_PATH_CLASS', $conn_path . 'etc'. DIRECTORY_SEPARATOR);

require CONN_PATH_CLASS . 'db_conn.php';




class CountRows 
{
    public $param1;
    public $param2;
    private $sql;
    public $stmt;
    public $rslt;


    public function __construct($param1, $param2)
    {
        $this->param1 = $param1;
        $this->param2 = $param2;
    }
    public function giveCount()
    {
        global $conn;
        $this->sql = "SELECT * FROM hseUnits WHERE u_landlord = ? AND HStatus = ?";
        $this->stmt = $conn->prepare($this->sql);
        $this->stmt->bind_param('ss', $this->param1, $this->param2);
        $this->stmt->execute();
        $this->rslt = $this->stmt->get_result();
        if($this->rslt->num_rows)
        {
            echo $this->rslt->num_rows;
        }else
        {
            echo '0';
        }
        
    }
}