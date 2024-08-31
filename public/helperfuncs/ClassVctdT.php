<?php

include('../etc/db_conn.php');

global $conn;

Class Vacated 

{
    public $v1;
    private $stmt;
    private $rslt;


    public function __construct($v1)
    {
        $this->v1 = $v1;
    }
    private function fetch()
    {  
        global $conn;
        $this->stmt = $conn->prepare("SELECT  * FROM vacatedtnts WHERE u_landlord = ?");
        $this->stmt->bind_param('s', $this->v1);
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
    public function getResult()
    {
        return $this->fetch();
    }
}