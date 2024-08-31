<?php

include('../etc/db_conn.php');

class fetchAvatar
{
    public $var1;
    public $var2;
    public $var3;
    public $stmt;
    public $results;
    public $resultsav;
    public $row;


    public function __construct($var1, $var2, $var3)
    {
        $this->var1 = $var1;
        $this->var2 = $var2;
    }
    private function fetchAva()
    {   global $conn;
        $this->sql = $conn->prepare("SELECT Avatar FROM hseTenantData WHERE u_landlord=? AND ApartmtName=? AND hseNo=?");
        $this->stmt->bind_param('sss', $var1, $var2, $var3);
        $this->stmt->execute();
        $this->results = $this->stmt->get_result();
        $this->resultsav = $this->results->fetch_all(MYSQLI_ASSOC);

        if($this->resultsav)
        {
            foreach($this->resultsav as $this->row)
            {
                echo $this->row['Avatar'];
            }
        }

    }
    public function printF()
    {
        return $this->fetchAva();
    }
}