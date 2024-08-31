<?php

$serverName = 'localhost';
$dbUsername = 'root';
$dbName = 'smartkodi';
$dbPass = "";

try 
{
    $conn = new PDO("mysql:host={$serverName}; dbname=smartkodi", $dbUsername, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}
catch(PDOException $e)
{
    echo "ERROR". $e->getMessage();
}