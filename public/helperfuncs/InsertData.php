<?php

include('./ClassConnect.php');

Class InsertData extends NewDbConnect
{
    public function __construct()
    {
        try
        {
            $this->insert = $this->connect();

            $this->insert->prepare("");
            $this->insert->bindParam("", $data);
            $this->insert->execute();
        }
        catch(PDOExecption $e)
    {
        echo "ERROR" . "<br />". $e->getMessage();
    }
    }
}