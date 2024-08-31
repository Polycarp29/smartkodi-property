<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASS', '');
define('DB_NAME', 'smartkodi');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);

if($conn->connect_error){
    die("Failed to connect" .$conn->connect_error);
}
echo 'Connect successful';

