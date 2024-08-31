<?php 
$serverName = 'localhost';
$dbUsername = 'root';
$dbPass = '';
$dbName = 'smartkodi';

/* create a new mysqli connection*/

$conn = new mysqli($serverName, $dbUsername, $dbPass, $dbName);

/* check is any errors have been occured */

if($conn->connect_error){
    die("Failed to connect" .$conn->connect_error);
}

