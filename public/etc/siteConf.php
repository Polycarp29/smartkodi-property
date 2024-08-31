<?php

class DbConn extends PDO 
{
    private $serverName = "localhost";
    private $dbUsername = "root";
    private $dbPass = "";
    private $dbName = "myDbPDO";
    private $f_name;
    private $l_name;
    private $email;
    private $conn;
    private $connect;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO("mysql:host={$this->serverName}; dbname=myDbPDO", $this->dbUsername,$this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conneted Successfully!";
        }catch(PDOException $e)
        {
            echo "ERROR UNABLE TO CONNECT". "<br />". $e->getMessage;
        }
    }


    public function InsertData(string $f_name, $l_name, $email)
    {
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->email = $email;

        $stmt = $this->conn->prepare("INSERT INTO Users(f_name, l_name, email)VALUES(:f_name, :l_name, :email)");
        $stmt->bindParam(":f_name", $f_name);
        $stmt->bindParam(":l_name", $l_name);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->execute() == true)
        {
            echo "Details Inserted sucessfully";
        }else
        {
            echo "Error Inserting Details"; 
        }
    }
    public function connect()
    {
        return $this->connect;
    }
}

$newconn = new DbConn();
$newconn->InsertData("James", "Doe", "janedoes@gmail.com");