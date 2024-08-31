<?php
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define("CONN_PT", $root . 'etc'. DIRECTORY_SEPARATOR);

require CONN_PT . 'db_conn.php';

$sql = "SELECT * FROM User_landlord WHERE u_name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $valueName);
$stmt->execute();
$results = $stmt->get_result();
$data = $results->fetch_all(MYSQLI_ASSOC);

